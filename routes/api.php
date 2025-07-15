<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\CreateCapsuleController;
use App\Http\Controllers\Users\DashboardController;
use App\Http\Controllers\Users\LoginController;
use App\Http\Controllers\Users\ProfileController;
use App\Http\Controllers\Users\PublicWallController;
use App\Http\Controllers\Users\RegisterController;
use App\Http\Controllers\Users\ViewCapsuleController;

Route::get('/createCapsule', [CreateCapsuleController::class, 'printCap']);
Route::get('/dashboard', [DashboardController::class, 'printDash']);
Route::get('/login', [LoginController::class, 'printLog']);
Route::get('/profile', [ProfileController::class, 'printPro']);
Route::get('/publicWall', [PublicWallController::class, 'printPub']);
Route::get('/register', [RegisterController::class, 'printReg']);
Route::get('/viewCapsule', [ViewCapsuleController::class, 'printView']);
