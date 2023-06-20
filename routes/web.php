<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserSettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/gamelist/login');
});

Route::prefix('gamelist')->group(function () {
    Route::get('/', function () {
        return redirect('/gamelist/login');
    });

    Route::middleware('autenticador')->group(function (){
        Route::resource('/admin', GameController::class)->except('edit', 'destroy', 'update', 'show');
    
        Route::get('/admin/home', [GameController::class, 'home'])->name('admin.home');
        
        Route::prefix('admin')->group(function (){
            Route::delete('/admin/destroy/{games}', [GameController::class, 'destroy'])->name('admin.destroy');
            Route::get('/admin/edit/{games}', [GameController::class, 'edit'])->name('admin.edit');
            Route::put('/admin/update/{games}', [GameController::class, 'update'])->name('admin.update');
            Route::get('/admin/show/{games}', [GameController::class, 'show'])->name('admin.show');
        });
    
        Route::prefix('settings')->group(function (){
            Route::get('/', [UserSettingsController::class, 'index'])->name('settings.index');
            Route::get('/photo', [UserSettingsController::class, 'changePhoto'])->name('settings.change_photo');
            Route::get('/password', [UserSettingsController::class, 'changePassword'])->name('settings.change_password');
            Route::post('/photo/update', [UserSettingsController::class, 'updatePhoto'])->name('settings.updatePhoto');
            Route::post('/password/update', [UserSettingsController::class, 'updatePassword'])->name('settings.updatePassword');
            Route::post('/name/update', [UserSettingsController::class, 'updateName'])->name('settings.updateName');
        });
        Route::get('/list/{listName}', [ListController::class, 'index'])->name('lists.index');
        Route::delete('/list/{list}/{game}', [ListController::class, 'removeGame'])->name('lists.removeGame');
        Route::post('/lists/store', [ListController::class, 'store'])->name('lists.store');
    
        Route::get('/search', [SearchController::class, 'index'])->name('search.index');
        Route::get('/search/show/{games}', [SearchController::class, 'show'])->name('search.show');
    
        Route::get('/reviews/index', [ReviewController::class, 'index'])->name('reviews.index');
        Route::post('/reviews/store', [ReviewController::class, 'store'])->name('reviews.store');
        Route::delete('/reviews/destroy/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
        Route::put('/reviews/update/{review}', [ReviewController::class, 'update'])->name('reviews.update');
    
        Route::get('/notes/index/{games}', [NoteController::class, 'index'])->name('notes.index');
        Route::post('/notes/store', [NoteController::class, 'store'])->name('notes.store');
        Route::delete('/notes/destroy/{notes}', [NoteController::class, 'destroy'])->name('notes.destroy');
        Route::put('/notes/update/{notes}', [NoteController::class, 'update'])->name('notes.update');
    });
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('signin');
    Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

    Route::get('/auth/google', [LoginController::class, 'redirectToGoogle']);
    Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback']);
    
    Route::get('/register', [UsersController::class, 'create'])->name('users.create');
    Route::post('/register', [UsersController::class, 'store'])->name('users.store');
    
    Route::get('/profile', [UsersController::class, 'index'])->name('users.index');
});