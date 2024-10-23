<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\FormulaireController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/articles', [ArticleController::class, 'show']);
Route::post('/messages', [MessageController::class,'store']);

Route::post('/formulaire', [FormulaireController::class, 'store']);
