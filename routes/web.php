<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
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
    Route::get('/{lang}/servicios','services')->name('services');
    Route::get('/{lang}/servicios/{service}','service')->name('service.index');
    Route::get('/{lang}/marcas','brands')->name('brands');
    Route::get('/{lang}/productos-marca/{brand:url_seo}','listProducts')->name('listProducts');
    Route::get('/{lang}/producto/{product:url_seo}','product_home')->name('product_home');
    Route::post('/contacto/compra/corroelectronico','contactoMail')->name('contactoMail');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard/home', 'index')->name('dashboard.index');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/dashboard/productos/lista', 'index')->name('productos.index');
    Route::get('/dashboard/productos/crear', 'create')->name('productos.create');
    Route::post('/dashboard/productos/guardar', 'store')->name('productos.store');
    Route::get('/dashboard/productos/{product}/editar', 'edit')->name('productos.edit');
    Route::put('/dashboard/productos/{product}', 'update')->name('productos.update');
});

Route::controller(BrandController::class)->group(function () {
    Route::get('/dashboard/marcas/lista', 'index')->name('marcas.index');
    Route::get('/dashboard/marcas/crear', 'create')->name('marcas.create');
    Route::post('/dashboard/marcas/guardar', 'store')->name('marcas.store');
    Route::get('/dashboard/marcas/{brand}/editar', 'edit')->name('marcas.edit');
    Route::put('/dashboard/marcas/{brand}', 'update')->name('marcas.update');
});

Route::controller(ServiceController::class)->group(function () {
    Route::get('/dashboard/servicios-util/lista', 'index')->name('servicios.index');
    Route::get('/dashboard/servicios-util/crear', 'create')->name('servicios.create');
    Route::post('/dashboard/servicios-util/guardar', 'store')->name('servicios.store');
    Route::get('/dashboard/servicios-util/{service}/editar', 'edit')->name('servicios.edit');
    Route::put('/dashboard/servicios-util/{service}', 'update')->name('servicios.update');

});

Route::controller(BlogController::class)->group(function () {
    Route::get('/dashboard/blog-util/lista', 'index')->name('blog.index');
    Route::get('/dashboard/blog-util/crear', 'create')->name('blog.create');
    Route::post('/dashboard/blog-util/guardar', 'store')->name('blog.store');
    Route::get('/dashboard/blog-util/{blog}/editar', 'edit')->name('blog.edit');
    Route::put('/dashboard/blog-util/{blog}', 'update')->name('blog.update');
});