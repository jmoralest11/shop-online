<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductoController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('welcome');
})->name('dashboard');

Route::middleware('auth')->group(function(){
    Route::resource('/products', ProductoController::class);
    Route::resource('/categories', CategoryController::class);
    Route::get('/show-products', [IndexController::class, 'index']);
    Route::get('/detail-product/{id_producto}', [IndexController::class, 'detail']);
    Route::get('/detail-cart', [CarritoController::class, 'detail']);
    Route::get('/data-shop', [CarritoController::class, 'data']);
    Route::get('/show-cart', [CarritoController::class, 'show']);
    Route::get('/add-cart/{id_producto}', [CarritoController::class, 'add']);
    Route::get('/remove-cart/{id_producto}', [CarritoController::class, 'remove']);
    Route::get('/update-cart/{id_producto}/{quantity}', [CarritoController::class, 'update']);
    Route::get('/clean-cart', [CarritoController::class, 'clean']);
    Route::post('/process-invoice', [InvoiceController::class, 'process']);
    Route::get('/show-invoices', [InvoiceController::class, 'shows']);
    Route::get('/show-invoice/{id_invoice}', [InvoiceController::class, 'show']);
    Route::get('/generator-pdf/{id_invoice}', [InvoiceController::class, 'pdf']);
    Route::get('/edit-condition/{id_invoice}', [InvoiceController::class, 'edit']);
});
