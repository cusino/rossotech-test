<?php

use Illuminate\Support\Facades\Route;
Auth::routes();

//users
Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->middleware('auth')->name('users.index');
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->middleware('auth')->name('users.index');
Route::get('/users/show/{user}', [App\Http\Controllers\UserController::class, 'show'])->middleware('auth')->name('users.show');
Route::get('/users/edit/{user}', [App\Http\Controllers\UserController::class, 'edit'])->middleware('auth')->name('users.edit');
Route::delete('/users/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
Route::put('/users/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');

//countries
Route::get('/countries', [App\Http\Controllers\CountryController::class, 'index'])->middleware('auth')->name('countries.index');
Route::get('/countries/show/{country}', [App\Http\Controllers\CountryController::class, 'show'])->middleware('auth')->name('countries.show');
Route::get('/countries/edit/{country}', [App\Http\Controllers\CountryController::class, 'edit'])->middleware('auth')->name('countries.edit');
Route::get('/countries/add', [App\Http\Controllers\CountryController::class, 'add'])->middleware('auth')->name('countries.add');
Route::get('/countries/create', [App\Http\Controllers\CountryController::class, 'create'])->name('countries.create');
Route::post('/countries', [App\Http\Controllers\CountryController::class, 'store'])->name('countries.store');