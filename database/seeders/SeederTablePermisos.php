<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\permission;


class SeederTablePermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
         'ver-rol',
         'crear-rol',
         'editar-rol',
         'borrar-rol',

         'ver-usuarios',
         'crear-usuarios',
         'editar-usuarios',
         'borrar-usuarios',

         'ver-productos',
         'crear-productos',
         'editar-productos',
         'borrar-productos',

         'ver-bodegas',
         'crear-bodegas',
         'editar-bodegas',
         'borrar-bodegas',

         'ver-proveedores',
         'crear-proveedores',
         'editar-proveedores',
         'borrar-proveedores',

         'ver-orden-compra',
         'crear-orden-compra',
         'editar-orden-compra',
         'borrar-orden-compra',

        ];
        foreach ($permisos as $permiso) {
            permission::create(['name' => "$permiso", 'guard_name' => 'web']);
        }
    }
}
