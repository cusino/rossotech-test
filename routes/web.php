<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\UserController;
Auth::routes();

//users
Route::get('/', [UserController::class, 'index'])->middleware('auth')->name('users.index');
Route::get('/users', [UserController::class, 'index'])->middleware('auth')->name('users.index');
Route::get('/users/show/{user}', [UserController::class, 'show'])->middleware('auth')->name('users.show');
Route::get('/users/edit/{user}', [UserController::class, 'edit'])->middleware('auth')->name('users.edit');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

//countries
Route::get('/countries', [CountryController::class, 'index'])->middleware('auth')->name('countries.index');
Route::get('/countries/show/{country}', [CountryController::class, 'show'])->middleware('auth')->name('countries.show');
Route::get('/countries/edit/{country}', [CountryController::class, 'edit'])->middleware('auth')->name('countries.edit');
Route::get('/countries/add', [CountryController::class, 'add'])->middleware('auth')->name('countries.add');
Route::get('/countries/create', [CountryController::class, 'create'])->name('countries.create');
Route::post('/countries', [CountryController::class, 'store'])->name('countries.store');
Route::delete('/countries/{id}', [CountryController::class, 'destroy'])->name('countries.destroy');