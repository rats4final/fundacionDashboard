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

        Permission::create(['name' => 'admin.dashboard'])->syncRoles([$adminRole]);
        Permission::create(['name' => 'admin.users.index'])->syncRoles([$adminRole]);
        //Permission::create(['name' => 'admin.users.create']); ??? maybe
        Permission::create(['name' => 'admin.users.edit'])->syncRoles([$adminRole]);
        Permission::create(['name' => 'admin.users.destroy'])->syncRoles([$adminRole]);
        Permission::create(['name' => 'sales.index'])->syncRoles([$adminRole, $sellerRole]);
    }
}
