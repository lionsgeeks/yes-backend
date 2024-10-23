<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MesageController;
use App\Http\Controllers\FormulaireController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('articles', ArticleController::class);
Route::get('/messages', [MesageController::class,'index'])->name('message.index');
Route::put('/messages/markread/{message}', [MesageController::class,'update'])->name('message.markread');
Route::delete('/messages/delete/{message}', [MesageController::class,'destroy'])->name('message.delete');

Route::get('/formulaire', [FormulaireController::class, 'index'])->name('form.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
