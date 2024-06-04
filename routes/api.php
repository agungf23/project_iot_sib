<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransducerController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\RuleController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Transducer
Route::get('/transducer', [TransducerController::class, 'index']);
Route::post('/transducer', [TransducerController::class, 'store']);
Route::get('/transducer/{id}', [TransducerController::class, 'show']);
Route::put('/transducer/{id}', [TransducerController::class, 'update']);
Route::delete('/transducer/{id}', [TransducerController::class, 'destroy']);

// Log
Route::get('/logs', [LogController::class, 'index']);
Route::post('/logs', [LogController::class, 'store']);
Route::get('/logs/{id}', [LogController::class, 'show']);
Route::put('/logs/{id}', [LogController::class, 'update']);
Route::delete('/logs/{id}', [LogController::class, 'destroy']);

// Rule
Route::get('/rules', [RuleController::class, 'index']);
Route::post('/rules', [RuleController::class, 'store']);
Route::get('/rules/{id}', [RuleController::class, 'show']);
Route::put('/rules/{id}', [RuleController::class, 'update']);
Route::delete('/rules/{id}', [RuleController::class, 'destroy']);



