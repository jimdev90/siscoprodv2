<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            "name" => "ADMINISTRADOR",
            "description" => "Administrador"
        ]);

        Role::create([
            "name" => "JEFE-DIRECCIÓN",
            "description" => "Jefe de Dirección"
        ]);

        Role::create([
            "name" => "JEFE-DIVISIÓN",
            "description" => "Jefe de División"
        ]);

        Role::create([
            "name" => "JEFE-DEPARTAMENTO",
            "description" => "Jefe de Departamento"
        ]);

        Role::create([
            "name" => "SECRETARIA",
            "description" => "Secretaria"
        ]);

        Role::create([
            "name" => "EFECTIVO-POLICIAL",
            "description" => "Efectivo Policial"
        ]);
    }
}
