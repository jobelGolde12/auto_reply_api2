<?php

use App\Http\Controllers\AutoReplyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

    Route::get('/auto-replies', [AutoReplyController::class, 'index']);
    Route::post('/auto-replies', [AutoReplyController::class, 'store']);
    Route::put('/auto-replies/{id}', [AutoReplyController::class, 'update']);
    Route::post('/chat/auto-reply', [AutoReplyController::class, 'getReply']);