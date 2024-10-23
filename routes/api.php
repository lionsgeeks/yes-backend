<?php

use App\Http\Controllers\Api\ArticleController;
<<<<<<< Updated upstream
use App\Http\Controllers\Api\MessageController;
=======
use App\Http\Controllers\Api\FormulaireController;
>>>>>>> Stashed changes
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/articles', [ArticleController::class, 'show']);
<<<<<<< Updated upstream
Route::post('/messages', [MessageController::class,'store']);
=======

Route::post('/formulaire', [FormulaireController::class, 'store']);
>>>>>>> Stashed changes
