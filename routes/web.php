<?php

use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\SoinController;
use App\Http\Controllers\TypeProduitController;
use App\Http\Controllers\TypeSoinController;
use App\Http\Controllers\UserController;
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




Route::controller(TypeProduitController::class)->prefix('admin')->group(function () {

    Route::get('/typeproduits', 'index');
    Route::post('/typeproduits/store', 'store')->name('create-type-produit');

});



Route::controller(SoinController::class)->prefix('admin')->group(function () {

    Route::get('/soins', 'index');
    Route::get('/soins/create', 'create')->name('create-soin');
    Route::post('/soins/store', 'store')->name('store-soin');
    Route::get('/soins/edit/{id}', 'edit')->name('edit-soin');
    Route::post('/soins/update/{id}', 'update')->name('update-soin');
});




Route::controller(ProduitController::class)->prefix('admin')->group(function () {

    Route::get('/produits', 'index');
    Route::get('/produits/create', 'create')->name('create-product');
    Route::post('/produits/store', 'store')->name('store-produit');
    Route::get('/produits/edit', 'edit')->name('edit-produit');
    Route::put('/produits/update', 'store')->name('update-produit');
});


Route::controller(FournisseurController::class)->prefix('admin')->group(function () {

    Route::get('/fournisseurs', 'index');
    Route::get('/fournisseurs/create', 'create')->name('create-fournisseur');
    Route::post('/fournisseurs/store', 'store')->name('store-fournisseur');
    Route::get('/fournisseurs/edit', 'edit')->name('edit-fournisseur');
    Route::put('/fournisseurs/update', 'store')->name('update-fournisseur');
});





Route::controller(UserController::class)->prefix('admin/utilisateurs')->group(function () {

    Route::get('/clients', 'indexClients');
    Route::get('/employes', 'indexEmployes');
    Route::get('/employes/create', 'createEmploye')->name('create-employe');
    Route::post('/employes/store', 'storeEmploye')->name('store-employe');
    Route::get('/clients/create', 'createEmploye')->name('create-client');
    Route::post('/client/store', 'storeClient')->name('store-client');
    Route::get('/clients/edit', 'editClient')->name('edit-client');
    Route::put('/client/update', 'udpdateClient')->name('update-client');
    Route::get('/employes/edit', 'editEmploye')->name('edit-employes');
    Route::put('/employes/update', 'storeUpdate')->name('update-employes');
});
