<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeaController;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/ideas', [IdeaController::class, 'store'])->name('ideas.store');
Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('ideas.show');
Route::get('/ideas/{idea}/eidt', [IdeaController::class, 'edit'])->name('ideas.edit');
Route::put('/ideas/{idea}', [IdeaController::class, 'update'])->name('ideas.update');
Route::delete('ideas/{idea}', [IdeaController::class, 'destroy'])->name('ideas.destroy');
Route::post('/ideas/{idea}/comments', [CommentController::class, 'store'])->name('ideas.comments.store');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');