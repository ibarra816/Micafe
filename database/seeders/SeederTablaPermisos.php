<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //operaciones sobre tabla roles 
            "ver-rol",
            "crear-rol",
            "editar-rol",
            "borrar-rol"
        ];

        // Itera sobre la matriz de permisos y crea cada permiso en la base de datos
        foreach ($permisos as $permiso) {
            // Verifica si el permiso ya existe en la base de datos
            if (!Permission::where('name', $permiso)->exists()) {
                // Crea el permiso si no existe
                Permission::create(['name' => $permiso]);
            }
        }
    }
}