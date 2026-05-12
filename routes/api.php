<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('test', function () {
return response()->json(['message' => 'OK']);
});

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;

Route::apiResource('categories', CategoryController::class);
Route::apiResource('items', ItemController::class);