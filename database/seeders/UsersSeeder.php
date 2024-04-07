<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
         * création un utilisateur administrateur
         */
        $userAdmin =User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password')
        ]);
        $userAdmin->Roles()->attach(Role::find('admin'));

        /*
         * création un utilisateur visiteur
         */
        $userVisitor =User::create([
            'name' => 'visitor',
            'email' => 'visitor@example.com',
            'password' => Hash::make('123456')
        ]);
        $userVisitor->Roles()->attach(Role::find('visitor'));
    }
}
