<?php

use App\Http\Controllers\front\TicketsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/


Route::apiResource('/users',UserController::class);


Route::apiResource('/orders',OrderController::class);




Route::apiResource('/tickets',TicketsController::class);
