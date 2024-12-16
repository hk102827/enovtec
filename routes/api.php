<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('data',[ApiController::class,'getData']);
Route::get('list/{id?}',[ApiController::class,'getProduct']);
Route::post('add-data',[ProductController::class,'addProduct']);
Route::put('update-product',[ProductController::class,'updateproduct']);
Route::delete('delete-product/{id}',[ProductController::class,'deleteproduct']);
Route::get('search-product/{name}',[ProductController::class,'searchproduct']);
Route::post('/product-validate',[ProductController::class,'productvalidate']);


Route::post('/login',[UserController::class,'login']);

Route::post('/File-Upload',[ProductController::class,'FileUpload']);