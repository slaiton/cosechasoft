<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeederSuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = User::create([
            "name" => "Super Admin", 
            "email" => "alopez@gmail.com", 
            "passwrod" => bcrypt('123456789')
        ]);

        $usuario->assignRole('Admin');
    }
}
