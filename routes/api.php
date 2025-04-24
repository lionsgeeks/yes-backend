<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\FormulaireController;
use App\Http\Controllers\Api\ParticipantsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MapController;
use App\Http\Controllers\Api\SelectController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/articles', [ArticleController::class, 'show']);
Route::post('/messages', [MessageController::class,'store']);

Route::post('/formulaire', [FormulaireController::class, 'store']);

Route::post("/participants",[ParticipantsController::class,"store"]);

Route::get('/maps', [MapController::class, 'index']);
Route::post('/maps', [MapController::class, 'store']);
Route::put('/maps/{map}', [MapController::class, 'update']);
Route::post('/maps/{map}/approve', [MapController::class, 'approve'])->name('maps.approve'); 
Route::get('/selects', [SelectController::class, 'index']);
Route::post('/type/store', [SelectController::class, 'store']);
