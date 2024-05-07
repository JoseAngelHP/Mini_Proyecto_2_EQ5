<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoriaController;
use App\Http\Controllers\presentacioneController;
use App\Http\Controllers\marcaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\compraController;
use App\Http\Controllers\proveedorController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\logoutController;

Route::get('/panel',[homeController::class,'index'])->name('panel');


Route::resource('categorias', categoriaController::class);
Route::resource('presentaciones', presentacioneController::class);
Route::resource('marcas', marcaController::class);
Route::resource('productos', ProductoController::class);
Route::resource('clientes', clienteController::class);
Route::resource('proveedores', proveedorController::class);
Route::resource('compras', compraController::class);

Route::get('/login', [loginController::class,'index'])->name('login');
Route::post('/login', [loginController::class,'login']);
Route::get('/logout', [logoutController::class,'logout'])->name('logout');

Route::get('/401', function () {
    return view('pages.401');
});

Route::get('/404', function () {
    return view('pages.404');
});

Route::get('/500', function () {
    return view('pages.500');
});