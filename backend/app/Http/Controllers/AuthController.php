<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();
    
    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json([
            'message' => 'Credenciais Inválidas'], 401);
    }

    // Verifica se o email foi confirmado
    if (!$user->hasVerifiedEmail()) {
        return response()->json([
            'message' => 'Verifique seu email antes de acessar o sistema.'], 403);
    }

    // Verifica se o usuário está ativo
    if ($user->status !== 'active') {
        return response()->json([
            'message' => 'Usuário inativo.'], 403);
    }

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'access_token' => $token,
        'token_type' => 'Bearer',
        'user' => $user
    ]);
    }

    public function me(Request $request)
    {
    return response()->json($request->user());
    }

    public function register(Request $request)
    {
    $request->validate([

        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|string|max:20|unique:users,phone',
        'password' => 'required|min:8|confirmed',
        'type' => 'required|in:proprietario,inquilino'
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'password' => $request->password,
        'status' => 'pending'
    ]);

    if($request->type == 'proprietario'){
        $user->profiles()->attach(2);
    }
    if($request->type == 'inquilino'){
        $user->profiles()->attach(3);
    }

    $user->sendEmailVerificationNotification();
    return response()->json(['message' => 'Cadastro realizado. Verifique seu email.'],201);
    }

    public function verifyEmail(Request $request)
{
    $user = User::findOrFail($request->id);

    if (!hash_equals(sha1($user->getEmailForVerification()),
        $request->hash
    )) {abort(403);
    }

    if (!$user->hasVerifiedEmail()) {

        $user->markEmailAsVerified();
        $user->update(['status' => 'active']);
    }

    return response()->json(['message' => 'Email verificado com sucesso']);
}

}
