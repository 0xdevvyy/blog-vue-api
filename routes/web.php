<?php

use App\Http\Controllers\API\V1\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function (){
    Route::get('/login', [SessionsController::class, 'create'])->name('login');
    Route::post('/login', [SessionsController::class, 'login'])->name('login.store');
});


Route::middleware('auth')->group(function (){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('auth.dashboard');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/{post:id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/{post:id}/update', [PostController::class, 'update'])->name('post.update');
});
