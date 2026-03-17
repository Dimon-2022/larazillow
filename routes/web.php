<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;

//Route::get('/', [IndexController::class, 'index']);
//
//
//Route::get('/show', [IndexController::class, 'show']);
//
//Route::get('/greeting/{name}', [IndexController::class, 'greeting']);


Route::resource('listing', ListingController::class)->only(['index', 'show', 'create', 'store', 'edit','update', 'destroy']);

Route::get('/login', [AuthController::class, 'create'])->name('login');

Route::post('/login', [AuthController::class, 'store'])->name('login.store');

Route::delete('/logout', [AuthController::class, 'destroy'])->name('logout');

