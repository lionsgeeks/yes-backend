<?php

use App\Http\Controllers\Api\AcademiqueController;
use App\Http\Controllers\Api\AgenceController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\BailleurController;
use App\Http\Controllers\Api\EntrepriseController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\FormulaireController;
use App\Http\Controllers\Api\ParticipantsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MapController;
use App\Http\Controllers\Api\OscController;
use App\Http\Controllers\Api\PubliqueController;
use App\Http\Controllers\Api\RegisterMapController;
use App\Http\Controllers\Api\SelectController;
use App\Http\Controllers\Api\ShowController;
use App\Http\Controllers\Api\VerificationCodeController;
use App\Http\Controllers\Api\VerificationController;
use App\Models\VerificationCode;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/articles', [ArticleController::class, 'show']);
Route::post('/messages', [MessageController::class,'store']);

Route::post('/formulaire', [FormulaireController::class, 'store']);

Route::post("/participants",[ParticipantsController::class,"store"]);
Route::post('register-map', [RegisterMapController::class, 'store']);
Route::post('verify-code', [VerificationCodeController::class, 'store']);
Route::post('organizations', [OscController::class, 'store']);
Route::post('bailleurs', [BailleurController::class, 'store']);
Route::post('entreprises', [EntrepriseController::class, 'store']);
Route::post('agences', [AgenceController::class, 'store']);
Route::post('publique', [PubliqueController::class, 'store']);
Route::post('academiques', [AcademiqueController::class, 'store']);
Route::post('approve', [ShowController::class, 'store']);
Route::post('approved', [ShowController::class, 'getApprovedGrouped']);

// Route::get('/maps', [MapController::class, 'index']);
// Route::post('/maps', [MapController::class, 'store']);
// Route::put('/maps/{map}', [MapController::class, 'update']);
// Route::post('/maps/{map}/approve', [MapController::class, 'approve'])->name('maps.approve'); 
Route::post("/ngo/invite/{formulaire}",[FormulaireController::class,"inviteToApp"])->name("ngo.invite");
Route::post("/participants/invite/{participant}",[ParticipantsController::class,"inviteToApp"])->name("participants.invite");
Route::get('/selects', [SelectController::class, 'index']);
Route::post('/type/store', [SelectController::class, 'store']);
