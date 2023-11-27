<?php

use App\Http\Controllers\AvatarController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'index')->name('index');

Route::view('/partials/regSuccess', 'partials.regSuccess')->name('regSuccess');

Route::post('/profile', [AvatarController::class, 'store'])->name('avatar.store');

Route::controller(ForumController::class)->prefix("/forum")->group(function () {

    Route::get('/', 'index')->name('forum');

    Route::get('/topic/{id}', 'show')->name('forum.topic');
    Route::view('/my-topics', 'forum.my-topics')->name('forum.my-topics')->middleware('auth');

    Route::post('/', 'store')->name('forum.topic.store')->middleware('auth');
    Route::post('/delete/{id}', 'destroy')->name('forum.topic.delete')->middleware('auth');
});

Route::controller(UserController::class)->group(function () {

    Route::view('/register', 'user.create')->name('register');
    Route::post('/register', 'store')->name('user.create');

    Route::view('/profile', 'user.edit')->name('user.profile')->middleware('auth');

    Route::post('/profile/delete', 'destroy')->name('user.delete')->middleware('auth');

    Route::view('/login', 'user.login')->name('login');
    Route::post('/login', 'authenticate')->name('user.login');

    Route::post('/logout', 'logout')->name('logout');
});


Route::middleware(['auth'])->group(function(){

    Route::post('/comment',[CommentController::class, 'store'])->name('comment.create');
    Route::post('/comment/delete/{id}', [CommentController::class, 'destroy'])->name('comment.delete');

});

