<?php

use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ReservationController;
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
    Route::post('/typeproduits/update/{id}', 'store')->name('update-type-produit');

});


Route::controller(TypeSoinController::class)->prefix('admin')->group(function () {

    Route::get('/typesoins', 'index');
    Route::post('/typesoins/store', 'store')->name('create-type-soin');

});




Route::controller(SoinController::class)->prefix('admin')->group(function () {

    Route::get('/soins', 'index');
    Route::get('/soins/create', 'create')->name('create-soin');
    Route::post('/soins/store', 'store')->name('store-soin');
    Route::get('/soins/edit/{id}', 'edit')->name('edit-soin');
    Route::post('/soins/update/{id}', 'update')->name('update-soin');
});


Route::controller(ReservationController::class)->prefix('admin')->group(function () {

    Route::get('/reservations', 'index');
    Route::get('/reservations/create', 'create')->name('create-reservation');
    Route::post('/reservations/store', 'store')->name('store-reservation');
    Route::get('/reservations/edit/{id}', 'edit')->name('edit-reservation');
    Route::post('/reservations/update/{id}', 'update')->name('update-reservation');
});





Route::controller(ProduitController::class)->prefix('admin')->group(function () {

    Route::get('/produits', 'index');
    Route::get('/produits/create', 'create')->name('create-product');
    Route::post('/produits/store', 'store')->name('store-produit');
    Route::get('/produits/edit/{id}', 'edit')->name('edit-produit');
    Route::put('/produits/update/{id}', 'update')->name('update-produit');
});


Route::controller(FournisseurController::class)->prefix('admin')->group(function () {

    Route::get('/fournisseurs', 'index');
    Route::get('/fournisseurs/create', 'create')->name('create-fournisseur');
    Route::post('/fournisseurs/store', 'store')->name('store-fournisseur');
    Route::get('/fournisseurs/edit/{id}', 'edit')->name('edit-fournisseur');
    Route::put('/fournisseurs/update/{id}', 'update');
});





Route::controller(UserController::class)->prefix('admin/utilisateurs')->group(function () {

    Route::get('/clients', 'indexClients');
    Route::get('/show/{id}', 'show')->name("show-user");
    Route::get('/employes', 'indexEmployes');
    Route::get('/employes/create', 'create')->name('create');
    Route::post('/employes/store', 'store')->name('store-user');
    Route::get('/clients/create', 'createEmploye')->name('create-client');
    Route::post('/client/store', 'storeClient')->name('store-client');
    Route::get('/edit/{id}', 'edit')->name('edit-user');
    Route::put('/update', 'update')->name('update-user');

});
