<?php

use Illuminate\Support\Facades\Route;

// controllers
use App\Http\Controllers\postsControllers;
use App\Http\Controllers\usersController;
use App\Http\Controllers\commentsController;


Route::get('/announcement', function () {
    return view('announcement');
});

Route::get('/landing', function () {
    return view('landing');
});
Route::get('/createpost', function () {
    return view('createpost');
});
//Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/* Routing for postman -- TESTING PURPOSES -- */
Route::get('/test/users/{id}',[usersController::class, 'viewUser']);
Route::get('/test/users/create', [usersController::class,'createUser']);
Route::get('/test/users/login', [usersController::class,'loginUser']);
Route::get('/test/users/update', [usersController::class, 'updateUser']);
Route::get('/test/users/delete', [usersController::class, 'deleteUser']);
# 46fd530d2987e2c0ed63620729c111b94c36644d

Route::get ('/test/posts', [postsControllers::class, 'retrievePosts']);
Route::get('/test/posts/{id}', [postsControllers::class, 'getPost']);
Route::get('/test/posts/create', [postsControllers::class, 'createPost']);
Route::get('/test/posts/update/{id}', [postsControllers::class, 'updatePost']);
Route::get('/test/posts/delete/{id}', [postsControllers::class, 'deletePost']);

Route::get('/test/comments/{id}',[commentsController::class, 'viewComments']);
Route::get('/test/comments/create', [commentsController::class, 'postComment']);
Route::get('/test/comments/update',[commentsController::class, 'updateComment']);
Route::get('/test/comments/delete/{id}',[commentsController::class, 'deleteComment']);
/* ^^ Routing for postman ^^*/
