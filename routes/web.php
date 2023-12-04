<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::view('components', 'components'); ruta que estaba usando para probar componentes de adminlte

Route::middleware('auth')->group(function () {

    /*
     * Rutas del perfil
     */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
     * Ruta principal que lleva al panel
     */
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /*
     * Rutas que llevan a los reportes
     */
    Route::view('reports', 'reports');//esto eventualmente sera un controlador
    Route::view('reportstwo','reportstwo');

    /*
     * Rutas de las tablas principales
     */
    Route::resource('users', UserController::class)->middleware('can:admin.dashboard');
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);

    /*
     * Ruta que estaba usando para probar softDeletes
     */
    //Route::get('/users/trashed', [UserController::class, 'trashed'])->name('users.trashed');
});

require __DIR__.'/auth.php';
