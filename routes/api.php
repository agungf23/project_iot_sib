<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransducerController;
use App\Http\Controllers\LogController;
use App\Htt


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

use App\Http\Controllers\RuleController;

Route::get('/rule', [RuleController::class, 'index']);
Route::post('/rule', [RuleController::class, 'store']);
Route::get('/rule/{id}', [RuleController::class, 'show']);
Route::put('/rule/{id}', [RuleController::class, 'update']);
Route::delete('/rule/{id}', [RuleController::class, 'destroy']);



