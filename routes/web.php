<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ViaCepController;
use Illuminate\Support\Facades\Route;

Route::get('/users',[UserController::class,'index'])->name('users.index');
Route::get('/users/{id}',[UserController::class,'show'])->name('users.show');

//VIA CEP WEB SERVICE
Route::get('/viacep',[ViaCepController::class,'index'])->name('viacep.index');
Route::post('/viacep',[ViaCepController::class,'index'])->name('viacep.index.post');
Route::get('/viacep/{cep}',[ViaCepController::class,'show'])->name('viacep.show');
