<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/produits', [\App\Http\Controllers\ProduitController::class,'indexView']);
Route::get('admin/typeproduits', [\App\Http\Controllers\TypeProduitController::class,'indexView']);
Route::get('admin/produit/create',[\App\Http\Controllers\ProduitController::class,'create'])->name("create-product");


Route::get('admin/utilisateurs/clients',[\App\Http\Controllers\UserController::class,'indexClients']);
Route::get('admin/utilisateurs/employes',[\App\Http\Controllers\UserController::class,'indexEmployes']);
