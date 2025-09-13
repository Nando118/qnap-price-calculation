<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\MasterData\ImportQNAPProductController;
use App\Http\Controllers\MasterData\QNAPProductController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function(){
    Route::redirect('/', '/login');
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login/submit', [AuthController::class, 'login'])->name('login.post');
});

Route::middleware('auth')->group(function(){
    // HOME
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');


    // MASTER DATA - QNAP PRODUCTS
    Route::get('/qnap-products', [QNAPProductController::class, 'index'])->name('qnap-products.index');
    Route::get('/qnap-products/add-product', [QNAPProductController::class, 'add_product'])->name('add-product.index');
    Route::post('/qnap-products/add-product/store', [QNAPProductController::class, 'store_product'])->name('add-product.post');
    Route::get('/qnap-products/import-product', [ImportQNAPProductController::class, 'import_product'])->name('import-product.index');
    Route::post('/qnap-products/import-product/store', [ImportQNAPProductController::class, 'import'])->name('import-product.post');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout.post');
});
