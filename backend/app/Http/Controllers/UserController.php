<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'required|string|max:20|unique:users,phone',
            'password' => 'required|string|min:8|confirmed',
            'profile_id' => 'required|exists:profiles,id',
        ]);

        //Criar User

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
        ]);

        //Associar o perfil

        $user->profiles()->attach($request->profile_id);

        // Retornar a resposta
        return response()->json($user, 201);
    }

    public function index()
    {
        $users = User::with('profiles')->get();
        return response()->json($users);
    }

    public function show($id)
    {
        $user = User::with('profiles')->findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate the incoming request data
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'sometimes|required|string|max:20|unique:users,phone,' . $user->id,
            'password' => 'sometimes|required|string|min:8|confirmed',
            'profile_id' => 'sometimes|required|exists:profiles,id',
        ]);

        // Update user attributes
        if ($request->has('name')) {
            $user->name = $request->name;
        }
        if ($request->has('email')) {
            $user->email = $request->email;
        }
        if ($request->has('phone')) {
            $user->phone = $request->phone;
        }
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        // Save the updated user
        $user->save();

        // Update profile association if provided
        if ($request->has('profile_id')) {
            $user->profiles()->sync([$request->profile_id]);
        }

        return response()->json($user);
    }

    public function deactivate($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'inactive';
        $user->save();

        return response()->json(['message' => 'User deactivated successfully']);
    }

    public function activate($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'active';
        $user->save();

        return response()->json(['message' => 'User activated successfully']);
    }
}

