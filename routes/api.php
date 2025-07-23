<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Users\CreateCapsuleController;
use App\Http\Controllers\Users\DeleteCapsuleController;
use App\Http\Controllers\Users\DashboardController;
use App\Http\Controllers\Users\ProfileController;
use App\Http\Controllers\Users\PublicWallController;
use App\Http\Controllers\Users\ViewCapsuleController;
use App\Http\Controllers\Common\AuthController;
use App\Http\Controllers\Users\MediaController;

Route::group(["prefix" =>"v0.1"], function(){
    Route::group(["middleware" => "auth:api"], function(){
        Route::group(["prefix" => "user"], function(){
        
            Route::post('/createCapsule', [CreateCapsuleController::class, 'addCapsule']);

            Route::delete('/deleteCapsule/{id}', [DeleteCapsuleController::class, 'deleteCapsule']);

            Route::get('/getUserCapsule/{id}', [DashboardController::class, 'getUserCapsules']);
            Route::get('/getPastCapsules/{id}', [DashboardController::class, 'getPastCapsules']);
            Route::get('/getUpcomingCapsules/{id}', [DashboardController::class, 'getUpcomingCapsules']);

            Route::get('/getInfo/{id}', [ProfileController::class, 'getUserInfo']);
            Route::post('/updateInfo/{id}', [ProfileController::class, 'updateUserInfo']);

            Route::get('/publicCapsules', [PublicWallController::class, 'getPublicCapsules']);
            Route::get('/getCapsule/{id}', [PublicWallController::class, 'getSpecificCapsule']);

            Route::get('/viewCapsule/{id}', [ViewCapsuleController::class, 'viewCapsule']);

            Route::get('/app/private/images/{filename}', [MediaController::class, 'getImage']);
            Route::get('/app/private/audios/{filename}', [MediaController::class, 'getAudio']);

        });
    });
    Route::group(["prefix" => "guest"], function(){
        Route::post("/login", [AuthController::class, "login"]);
        Route::post("/register", [AuthController::class, "register"]);

        Route::get("/viewSharedCapsule/{token}", [ViewCapsuleController::class, "viewSharedCapsule"]);
        Route::get('/app/private/images/{filename}', [MediaController::class, 'getImage']);
        Route::get('/app/private/audios/{filename}', [MediaController::class, 'getAudio']);
    });
});