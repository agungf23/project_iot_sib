<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransducerController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/transducer', [TransducerController::class, 'index']);
Route::post('/transducer', [TransducerController::class, 'store']);
Route::get('/transducer/{id}', [TransducerController::class, 'show']);
Route::put('/transducer/{id}', [TransducerController::class, 'update']);
Route::delete('/transducer/{id}', [TransducerController::class, 'destroy']);
