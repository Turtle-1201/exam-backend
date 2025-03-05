<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['cors'])->group(function () {
    
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');
    
    Route::apiResource('posts', PostController::class);
    
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/show-user', [AuthController::class, 'show'])->middleware('auth:sanctum');
    Route::get('/show-user/{id}', [AuthController::class, 'showById'])->middleware('auth:sanctum');
    Route::put('/update-user', [AuthController::class, 'update'])->middleware('auth:sanctum');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    
})

// Route::get('/post', function () {
//     return 'API';
// });
