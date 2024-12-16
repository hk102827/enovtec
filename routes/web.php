<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingsController;
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

Route::get('/', [ProductController::class, 'index']);
Route::get('/product/create', [ProductController::class, 'create']);
Route::post('/product/store', [ProductController::class, 'store']);
Route::get('/product/{id}/edit', [ProductController::class, 'edit']);
Route::post('/product/{id}/edit', [ProductController::class, 'update']);
Route::get('/product/{id}/delete', [ProductController::class, 'destroy']);
Route::get('/product/{id}/show', [ProductController::class, 'show']);


// Topic Practice

Route::get('/url', [UserController::class,'index']);



// setting
Route::get('/settings', [SettingsController::class, 'showSettings']);
Route::post('/settings/update', [SettingsController::class, 'updateSettings'])->name('settings.update');