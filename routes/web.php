<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\SelectController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MesageController;
use App\Http\Controllers\FormulaireController;
use App\Http\Controllers\MapsController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (request()->redirect == "true") {
        return redirect()->to('https://youthempowermentsummit.africa/');
    } else {
        return view("welcome");
    }
});



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
    Route::resource('maps', MapsController::class);
    Route::post('/category/store', [SelectController::class, 'store']);
    Route::post('/type/store', [SelectController::class, 'store']);
    Route::post('/option/store', [SelectController::class, 'store']);
});

require __DIR__ . '/auth.php';
