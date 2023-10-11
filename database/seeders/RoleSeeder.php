<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name' => 'admin']);
        $sellerRole = Role::create(['name' => 'seller']);

        Permission::create([
          'name' => 'admin.dashboard',
          'description' => 'Ver el dashboard'
          ])->syncRoles([$adminRole]);
        Permission::create([
          'name' => 'admin.users.index',
          'description' => 'Ver los usuarios'
          ])->syncRoles([$adminRole]);
        Permission::create([
          'name' => 'admin.users.create',
          'description' => 'Crear usuarios'])->syncRoles([$adminRole]);
        Permission::create([
          'name' => 'admin.users.edit',
          'description' => 'Asignar Roles a Usuarios'])->syncRoles([$adminRole]);
        Permission::create([
          'name' => 'admin.users.destroy',
          'description' => 'Eliminar Usuarios'])->syncRoles([$adminRole]);
        Permission::create([
          'name' => 'sales.index',
          'description' => 'Ver las ventas'])->syncRoles([$adminRole, $sellerRole]);
    }
}
