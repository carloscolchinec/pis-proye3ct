<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\EnterpriseUserController;
use App\Http\Controllers\CheckEnterpriseUserController;
use App\Http\Controllers\EnterpriseClientsController;

use App\Models\EnterpriseUser;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Rutas para el panel de administradores
Route::group(['prefix' => 'admin'], function () {
    // Rutas de autenticación

    Route::get('login', [AdminUserController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminUserController::class, 'login'])->name('admin.login.submit');
    Route::post('logout', [AdminUserController::class, 'logout'])->name('admin.logout');


    Route::get('listar-empresas', [EnterpriseUserController::class, 'index'])->name('admin.listar-empresas');
    Route::get('agregar-empresa', [EnterpriseUserController::class, 'create'])->name('admin.agregar-empresa');
    Route::post('crear-empresa', [EnterpriseUserController::class, 'store'])->name('admin.crear-empresa');

    // Rutas del dashboard
    Route::get('dashboard', [AdminUserController::class, 'dashboard'])->name('admin.dashboard');
});

// Rutas para el panel de empresas
Route::group(['prefix' => 'enterprise'], function () {


    // Rutas de autenticación
    Route::get('login', [CheckEnterpriseUserController::class, 'showLoginForm'])->name('enterprise.login');
    Route::post('login', [CheckEnterpriseUserController::class, 'login'])->name('enterprise.login.submit');
    Route::post('logout', [CheckEnterpriseUserController::class, 'logout'])->name('enterprise.logout');

    // Rutas del dashboard
    Route::get('dashboard', [CheckEnterpriseUserController::class, 'dashboard'])->name('enterprise.dashboard');

    Route::get('clientes', [EnterpriseClientsController::class, 'index'])->name('enterprise.clients');

});
