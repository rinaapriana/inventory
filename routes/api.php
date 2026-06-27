<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;

Route::prefix('v1')->group(function() {
HEAD
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('throttle:60,1')->group(function () {

    Route::apiResource('categories', CategoryController::class);

    Route::apiResource('items', ItemController::class);

    Route::post('register',
        'App\Http\Controllers\AuthController@register');

    Route::post('login',
        'App\Http\Controllers\AuthController@login');

    Route::middleware('auth:sanctum')->group(function(){

        // Categories
        Route::apiResource('categories',
            'App\Http\Controllers\CategoryController')
            ->except(['destroy']);

        Route::delete('categories/{category}',
            'App\Http\Controllers\CategoryController@destroy')
            ->middleware('role:admin');

        // Items
        Route::apiResource('items',
            'App\Http\Controllers\ItemController')
            ->except(['destroy']);

        Route::delete('items/{item}',
            'App\Http\Controllers\ItemController@destroy')
            ->middleware('role:admin');

    });
origin/feature/auth-sanctum

});