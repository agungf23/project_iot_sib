<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransducerController;
use App\Http\Controllers\LogController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/transducer', [TransducerController::class, 'index']);
Route::post('/transducer', [TransducerController::class, 'store']);
Route::get('/transducer/{id}', [TransducerController::class, 'show']);
Route::put('/transducer/{id}', [TransducerController::class, 'update']);
Route::delete('/transducer/{id}', [TransducerController::class, 'destroy']);

Route::get('/log', [LogController::class, 'index']);
Route::post('/log', [LogController::class, 'store']);
Route::get('/log/{id}', [LogController::class, 'show']);
Route::put('/log/{id}', [LogController::class, 'update']);
Route::delete('/log/{id}', [LogController::class, 'destroy']);


