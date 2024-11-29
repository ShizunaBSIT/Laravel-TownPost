<?php

use Illuminate\Support\Facades\Route;

// controllers
use App\Http\Controllers\postsControllers;
use App\Http\Controllers\usersController;
use App\Http\Controllers\commentsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('announcement');
});

Route::get('/landing', function () {
    return view('landing');
});
Route::get('/createpost', function () {
    return view('createpost');
});
Route::get('/editpost', function () {
    return view('editpost');
});
//Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Register Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/* Routing for postman -- TESTING PURPOSES -- */
Route::get('/test/users/{id}',[usersController::class, 'viewUser']);
Route::post('/test/users/create', [usersController::class,'createUser']);
Route::get('/test/users/login', [usersController::class,'loginUser']);
Route::put('/test/users/update', [usersController::class, 'updateUser']);
Route::delete('/test/users/delete', [usersController::class, 'deleteUser']);


Route::get ('/test/posts', [postsControllers::class, 'retrievePosts'])->name('posts.get');
Route::get('/test/posts/{id}', [postsControllers::class, 'getPost'])->name('posts.find');
Route::post('/test/posts/create', [postsControllers::class, 'createPost'])->name('posts.create');
Route::put('/test/posts/update/{id}', [postsControllers::class, 'updatePost'])->name('posts.update');
Route::delete('/test/posts/delete/{id}', [postsControllers::class, 'deletePost'])->name('posts.delete');

Route::get('/test/comments/{id}',[commentsController::class, 'viewComments']);
Route::post('/test/comments/create', [commentsController::class, 'postComment']);
Route::put('/test/comments/update',[commentsController::class, 'updateComment']);
Route::delete('/test/comments/delete/{id}',[commentsController::class, 'deleteComment']);
/* ^^ Routing for postman ^^*/
