<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('login');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

  
Route::middleware(['auth'])->group(function () {
    Route::match(['get', 'post'],  '/navbar/search',[SearchController::class, 'showNavbarSearchResults']);

    Route::get('admin/blog', [DashboardController::class, 'blog'])->name('admin.blog');
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/productos', [DashboardController::class, 'productos'])->name('admin.productos');
    Route::get('admin/categorias', [DashboardController::class, 'categorias'])->name('admin.categorias');
    Route::get('admin/entradas', [DashboardController::class, 'entradas'])->name('admin.entradas');
    Route::get('admin/salidas', [DashboardController::class, 'salidas'])->name('admin.salidas');
    Route::get('admin/almacen', [DashboardController::class, 'almacen'])->name('admin.almacen');
    Route::get('admin/permisos', [DashboardController::class, 'permisos'])->name('admin.permisos');
    Route::get('admin/roles', [DashboardController::class, 'roles'])->name('admin.roles');
    Route::get('admin/usuarios', [DashboardController::class, 'usuarios'])->name('admin.usuarios');
    Route::get('admin/reportes', [DashboardController::class, 'reportes'])->name('admin.reportes');
    Route::get('admin/estadisticas', [DashboardController::class, 'estadisticas'])->name('admin.estadisticas');
});
