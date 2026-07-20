<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::create([
            'name' => 'Administrador',
            'description' => 'Administrator profile with full access',
        ]);
        Profile::create([
            'name' => 'Vistoriador',
            'description' => 'Profile for inspectors with access to inspections and related data',
        ]);
        Profile::create([
            'name' => 'Locatário',
            'description' => 'Profile for tenants with access to their rented properties',
        ]);
        Profile::create([
            'name' => 'Proprietário',
            'description' => 'Profile for property owners with access to their properties and contracts',
        ]);

    }
}
