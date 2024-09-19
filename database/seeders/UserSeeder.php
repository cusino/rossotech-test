<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crea un utente admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // Crea un utente normale
        $user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // Assegna il ruolo 'admin' all'utente admin
        $adminRole = Role::where('name', 'admin')->first();
        $admin->roles()->attach($adminRole);

        // Assegna il ruolo 'user' all'utente normale
        $userRole = Role::where('name', 'user')->first();
        $user->roles()->attach($userRole);
    }
}
