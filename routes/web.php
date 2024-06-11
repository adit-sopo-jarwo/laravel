<?php

use App\Http\Controllers\BuahController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BuahController::class, 'index'])->name('index');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {

    Route::get('/Create', [BuahController::class, 'Create'])->name('Create');
    Route::post('/Store', [BuahController::class, 'Store'])->name('Store');
    Route::get('/Edit/{id}', [BuahController::class, 'Edit'])->name('Edit');
    Route::put('/Update/{id}', [BuahController::class, 'Update'])->name('Update');
    Route::delete('/Delete/{id}', [BuahController::class, 'Delete'])->name('Delete');

    Route::get('/Order', [PesananController::class, 'Order'])->name('Order');
    Route::get('/Create-Order', [PesananController::class, 'Create_Order'])->name('Create-Order');
    Route::post('/Store-Order', [PesananController::class, 'Store_Order'])->name('Store-Order');
    Route::put('/Update-Status/{id}', [PesananController::class, 'Update_Status'])->name('Update-Status');


    Route::get('/Supplier', [SupplierController::class, 'Supplier'])->name('Supplier');
    Route::get('/Create-Supplier', [SupplierController::class, 'Create_Supplier'])->name('Create-Supplier');
    Route::post('/Store-Supplier', [SupplierController::class, 'Store_Supplier'])->name('Store-Supplier');
    Route::get('/Edit-Supplier', [SupplierController::class, 'Edit_Supplier'])->name('Edit-Supplier');
    Route::put('/Update-Supplier/{id}', [SupplierController::class, 'Update_Supplier'])->name('Update-Supplier');
    Route::delete('/Delete-Supplier/{id}', [SupplierController::class, 'Delete_Supplier'])->name('Delete-Supplier');
});
