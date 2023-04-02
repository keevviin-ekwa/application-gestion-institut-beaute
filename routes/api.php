<?php

use App\Http\Controllers\ProduitController;
use App\Http\Controllers\SoinController;
use App\Http\Controllers\TypeProduitController;
use App\Http\Controllers\TypeSoinController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::resource('typeProduit', TypeProduitController::class);
Route::resource('typeSoin', TypeSoinController::class);
Route::resource('soin',SoinController::class);
Route::resource('produit',ProduitController::class);
