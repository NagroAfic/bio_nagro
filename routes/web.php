<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'redirectToHome')->name('redirectHome');
    Route::get('/{lang}','index')->name('home');
    Route::get('/{lang}/services','services')->name('services');
    Route::get('/{lang}/service/{url_seo}','services')->name('services');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard/home', 'index')->name('dashboard.index');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/dashboard/productos/lista', 'index')->name('productos.index');
    Route::get('/dashboard/productos/crear', 'create')->name('productos.create');
    Route::post('/dashboard/productos/guardar', 'store')->name('productos.store');
});

Route::controller(BrandController::class)->group(function () {
    Route::get('/dashboard/marcas/lista', 'index')->name('marcas.index');
    Route::get('/dashboard/marcas/crear', 'create')->name('marcas.create');
    Route::post('/dashboard/marcas/guardar', 'store')->name('marcas.store');
});