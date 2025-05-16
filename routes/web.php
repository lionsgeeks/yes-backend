<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\AcademiqueController;
use App\Http\Controllers\Api\AgenceController;
use App\Http\Controllers\Api\BailleurController;
use App\Http\Controllers\Api\EntrepriseController;
use App\Http\Controllers\Api\OscController;
use App\Http\Controllers\Api\PubliqueController;
use App\Http\Controllers\Api\SelectController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MesageController;
use App\Http\Controllers\FormulaireController;
use App\Http\Controllers\MapsController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Register_MapController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterMapController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\OscController as ControllersOscController;
use App\Http\Controllers\showController;

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::resource('articles', ArticleController::class);
    Route::resource('forms', FormulaireController::class);
    Route::resource("participants", ParticipantController::class);

    Route::get('/messages', [MesageController::class, 'index'])->name('message.index');
    Route::put('/messages/markread/{message}', [MesageController::class, 'update'])->name('message.markread');
    Route::delete('/messages/delete/{message}', [MesageController::class, 'destroy'])->name('message.delete');
    Route::get('/users', [AdminController::class, 'index'])->name('admins.index');
    Route::post('/users/create', [AdminController::class, 'store'])->name('admins.store');

    Route::get('/formulaire', [FormulaireController::class, 'index'])->name('form.index');
    Route::post('/formulaire/store', [FormulaireController::class, 'manualStore'])->name('form.manualStore');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/formulaire/export', [FormulaireController::class, 'export'])->name('form.export');
    Route::post('forms/invite/{form}', [FormulaireController::class, 'invite'])->name('forms.invite');
    Route::post('organizations', [OscController::class, 'store']);
    Route::post('register-map', [RegisterMapController::class, 'store']);
    Route::get('/maps', [ShowController::class, 'index']);
    Route::post('/maps', [ShowController::class, 'store'])->name('shows.store');
    Route::post('/maps/{id}/approve', [ShowController::class, 'approve'])->name('admin.approve');
    Route::post('/maps/{show}/reject', [ShowController::class, 'reject'])->name('admin.shows.reject');
    Route::post('/category/store', [SelectController::class, 'store']);
    Route::post('/type/store', [SelectController::class, 'store']);
    Route::post('/option/store', [SelectController::class, 'store']);
    Route::delete('/organizations/{id}', [OscController::class, 'destroy']);
    Route::delete('/bailleurs/{id}', [BailleurController::class, 'destroy']);
    Route::delete('/agences/{id}', [AgenceController::class, 'destroy']);
    Route::delete('/entreprises/{id}', [EntrepriseController::class, 'destroy']);
    Route::delete('/publiques/{id}', [PubliqueController::class, 'destroy']);
    Route::delete('/academiques/{id}', [AcademiqueController::class, 'destroy']);
    Route::get('/details/{type}/{id}', [DetailsController::class, 'show'])->name('details.show');
});

require __DIR__ . '/auth.php';
