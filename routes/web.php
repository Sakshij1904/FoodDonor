<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodDonationController;
use App\Http\Controllers\UserController;

// Login Register
Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'saveRegister']);

Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'checkLogin']);

Route::get('/logout', [UserController::class, 'logout']);

// Food Donation
Route::get('/', [FoodDonationController::class, 'index']);

Route::post('/donate', [FoodDonationController::class, 'store']);

Route::get('/dashboard', [FoodDonationController::class, 'dashboard']);

Route::post('/accept/{id}', [FoodDonationController::class, 'accept']);

Route::get('/edit/{id}', [FoodDonationController::class, 'edit']);

Route::post('/update/{id}', [FoodDonationController::class, 'update']);

Route::get('/delete/{id}', [FoodDonationController::class, 'delete']);