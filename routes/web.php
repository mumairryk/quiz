<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class, 'home'])->name('home');
Route::post('/create/user', [UserController::class, 'create'])->name('user.create');
//create routes using the middleware checkUserSession
Route::middleware(['checkUserSession'])->group(function () {
    Route::get('/questions', [QuestionController::class, 'index'])->name('question.index');
    Route::get('/question/get-next-question', [QuestionController::class, 'getNextQuestion'])->name('question.get-next-question');
    Route::post('/question/save-answer', [QuestionController::class, 'saveAnswer'])->name('question.save-answer');
    Route::get('/user/result', [UserController::class, 'result'])->name('user.result');
});
