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
Route::post('admin/typeproduit/create',[\App\Http\Controllers\TypeProduitController::class,'store'])->name("create-type-produit");
Route::get('admin/produit/create',[\App\Http\Controllers\ProduitController::class,'create'])->name("create-product");


Route::get('admin/utilisateurs/clients',[\App\Http\Controllers\UserController::class,'indexClients']);
Route::get('admin/utilisateurs/employes',[\App\Http\Controllers\UserController::class,'indexEmployes']);

Route::get('admin/fournisseurs/create',[\App\Http\Controllers\FournisseurController::class,'create'])->name('create-fournisseur');
Route::get('admin/fournisseurs',[\App\Http\Controllers\FournisseurController::class,'index']);
Route::post('admin/fournisseurs/store',[\App\Http\Controllers\FournisseurController::class,'store'])->name('store-fournisseur');
