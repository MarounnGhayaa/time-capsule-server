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

Route::group(["prefix" =>"v0.1"], function(){
    Route::group(["prefix" => "user"], function(){

        Route::get('/printCapsule', [CreateCapsuleController::class, 'printCap']);

        Route::get('/printDashboard', [DashboardController::class, 'printDash']);
        Route::get('/getUserCapsule/{id}', [DashboardController::class, 'getUserCapsules']);
        Route::get('/getTotalCapsulesNb/{id}', [DashboardController::class, 'getTotalCapsulesNb']);
        Route::get('/getPastCapsulesNb/{id}', [DashboardController::class, 'getPastCapsulesNb']);
        Route::get('/getUpcomingCapsulesNb/{id}', [DashboardController::class, 'getUpcomingCapsulesNb']);

        Route::get('/printLogin', [LoginController::class, 'printLog']);

        Route::get('/printProfile', [ProfileController::class, 'printPro']);
        Route::get('/getInfo/{id}', [ProfileController::class, 'getUserInfo']);

        Route::get('/printPublicWall', [PublicWallController::class, 'printPub']);
        Route::get('/publicCapsules', [PublicWallController::class, 'getPublicCapsules']);
        Route::get('/getCapsule/{id}', [PublicWallController::class, 'getSpecificCapsule']);

        Route::get('/printRegister', [RegisterController::class, 'printReg']);

        Route::get('/printCapsule', [ViewCapsuleController::class, 'printView']);
        Route::get('/viewCapsule/{id}', [ViewCapsuleController::class, 'viewCapsule']);
    });
});
