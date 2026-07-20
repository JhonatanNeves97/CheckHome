<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Administrator',
            'email' => 'jho_neves@hotmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '19992201886',
            'status' => 'active',
            ]);

            $profile = Profile::where('name', 'Administrador')->first();
            $user->profiles()->attach($profile->id);
    }
}
