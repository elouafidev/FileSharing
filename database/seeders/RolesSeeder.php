<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * creation des rôles de visiteur et d'administrateur
         */
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'visitor']);
    }
}
