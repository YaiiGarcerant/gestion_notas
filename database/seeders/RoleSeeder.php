<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rol1 = Role::create(['name' => 'ADMINISTRADOR GENERAL']);
        /*
        ADMINISTRADOR GENERAL -> REGISTRA LOS USUARIOS
        */ 

        $rol2 = Role::create(['name' => 'PROFESOR']);
        /*
        
        */ 

        $rol3 = Role::create(['name' => 'ESTUDIANTE']);
        /*
        
        */ 

        $usuario = \App\Models\User::find(1);
        $usuario->assignRole($rol1);
    }
}
