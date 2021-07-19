<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
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

/* Route::get('/create', function () {return view('create');});
Route::post('show', function ($id) {

}); */
Route::view('create', 'create');
Route::post('viewdata', [StoreController::class,'store'])->name('product.store');
Route::put('/updatedata/{id}', [StoreController::class,'update'])->name('product.update');
Route::get('/', [StoreController::class, 'index']);
/* Route::get('/cd',[StoreController::class, 'cd']); */
Route::get('/edit-bookproduct-form/{id}',[StoreController::class,'show'])->name('bookProduct.edit');
Route::get('/edit-product-form/{id}',[StoreController::class, 'show'])->name('product.edit');
Route::delete('product-delete/{id}', [StoreController::class,'destroy'])->name('product.delete');


