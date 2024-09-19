<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Inserisci i ruoli base nella tabella 'roles'
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
    }
}
