<?php

use App\Http\Controllers\Dashboard\ArticleController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\QuizController;
use App\Http\Controllers\PasscodeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'pages.public.passcode')->name('passcode');
Route::post('/enter-passcode', [PasscodeController::class, 'enterPasscode'])->name('enter.passcode');
Route::delete('/delete-passcode', [PasscodeController::class, 'deletePasscode'])->name('delete.passcode');

Route::prefix('dashboard')->middleware('passcode')->group(function () {
    Route::view('/', 'pages.dashboard.index')->name('dashboard');

    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::view('/create', 'pages.dashboard.category.create')->name('create.view');
        Route::post('/create', [CategoryController::class, 'create'])->name('create.process');
        Route::delete('/{categoryId}', [CategoryController::class, 'delete'])->name('delete');
    });

    Route::prefix('article')->name('article.')->group(function () {
        Route::get('/', [ArticleController::class, 'index'])->name('index');
    });

    Route::prefix('quiz')->name('quiz.')->group(function () {
        Route::get('/', [QuizController::class, 'index'])->name('index');
    });
});
