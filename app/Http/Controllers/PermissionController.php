<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index(){
        $permissions = Permission::all();
        return view('admin.permissions.index', compact("permissions"));
    }

    public function create(){
        $roles = Role::all();
        return view("admin.permissions.create", compact("roles"));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required'],
            'description' => ['required']
        ]);
        $permission = Permission::create($request->all());
        $permission->roles()->sync($request->roles);

        return to_route('permissions.index');
    }

    public function show(Permission $permission){
        $permission->load("roles");
        return view("admin.permissions.show", compact("permission"));
    }

    public function edit(Permission $permission){
        $roles = Role::all();
        return view("admin.permissions.edit", compact("permission","roles"));
    }

    public function update(Request $request, Permission $permission): RedirectResponse
    {
        $request->validate([
            'name' => ['required'],
            'description' => ['required']
        ]);
        $permission->roles()->sync($request->roles);

        return to_route('permissions.edit', $permission);
    }

    public function destroy(Permission $permission): RedirectResponse
    {
        $permission->delete();
        return to_route("permissions.index");
    }
}
