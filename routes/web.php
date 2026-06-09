<?php

use App\Http\Controllers\API\V1\PostController;
use App\Http\Controllers\API\V1\TagController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function (){
    Route::get('/login', [SessionsController::class, 'create'])->name('login');
    Route::post('/login', [SessionsController::class, 'login'])->name('login.store');
});


Route::middleware('auth')->group(function (){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('auth.dashboard');
    
    Route::prefix('post')->group(function (){
        Route::get('/create', [PostController::class, 'create'])->name('post.create');
        Route::post('/store', [PostController::class, 'store'])->name('post.store');
        Route::get('/{post:id}/edit', [PostController::class, 'edit'])->name('post.edit');
        Route::patch('/{post:id}/update', [PostController::class, 'update'])->name('post.update');
        Route::delete('/{post:id}/delete', [PostController::class, 'destroy'])->name('post.delete');
    });

    // Route::get('/tags', [TagController::class, 'create'])->name('tags.create');

    Route::prefix('tag')->group(function(){
        Route::post('/store', [TagController::class, 'store'])->name('tag.store');
        Route::put('/{tag}/update', [TagController::class, 'update'])->name('tag.update');
        Route::delete('/{tag}/delete', [TagController::class, 'destroy'])->name('tag.delete');
    });
    
});
