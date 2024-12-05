<?php

use Illuminate\Support\Facades\Route;

// controllers
use App\Http\Controllers\postsControllers;
use App\Http\Controllers\usersController;
use App\Http\Controllers\commentsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\reactionController;

Route::get('/editpost', function () {
    return view('editpost');
});
Route::get('/postreactions', function () {
    return view('postreactions');
});
Route::view('/announcement','announcement')->name('return.announcement');

Route::get('/showposts', function () {
    $user = auth()->user(); // Get the authenticated user
    return view('showposts', compact('user'));
});

Route::get('/createpost', function () {
    return view('createpost');
});
Route::view('/modals', 'modal')->name('modals.account');

// Comments Routes
Route::get('/comments/{id}', [commentsController::class, 'viewComments'])->name('comments.view');
Route::post('/comments', [commentsController::class, 'postComment'])->name('comments.create');
Route::put('/comments', [commentsController::class, 'updateComment'])->name('comments.update');
Route::delete('/comments/{id}', [commentsController::class, 'deleteComment'])->name('comments.delete');

//Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//Register Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/// routing to web test
Route::get ('/', [postsControllers::class, 'retrievePosts'])->name('posts.get');
Route::get('/landing', [postsControllers::class, 'showPosts'])->name('posts.index');


/* Routing for postman -- TESTING PURPOSES -- */
Route::get('/test/users/{id}',[usersController::class, 'viewUser']);
Route::post('/test/users/create', [usersController::class,'createUser']);
Route::get('/test/users/login', [usersController::class,'loginUser']);
Route::put('/test/users/update', [usersController::class, 'updateUser']);
Route::delete('/test/users/delete', [usersController::class, 'deleteUser']);

// search method
Route::get('/test/post/search/{input}',[postsControllers::class, 'searchPost']);

Route::get('/test/comments/{id}',[commentsController::class, 'viewComments'])->name('comments.get');
Route::post('/test/comments/create', [commentsController::class, 'postComment'])->name('comments.post');


Route::get ('/test/posts/retrieve', [postsControllers::class, 'retrievePosts'])->name('retrievePosts');
Route::get('/test/posts/{id}', [postsControllers::class, 'getPost'])->name('getPost');

Route::get ('/', [postsControllers::class, 'retrievePost'])->name('retrievePost');
Route::get('/test/posts/{id}', [postsControllers::class, 'getPost'])->name('getPost');
Route::post('/createpost', [postsControllers::class, 'createPost'])->name('createPost');
Route::put('/test/posts/update/{id}', [postsControllers::class, 'updatePost'])->name('updatePost');
Route::delete('/test/posts/delete/{id}', [postsControllers::class, 'deletePost'])->name('deletePost');
Route::get('/token', function(){
    return csrf_token();
});

Route::get('/test/comments/{id}',[commentsController::class, 'viewComments']);
Route::post('/test/comments/create', [commentsController::class, 'postComment'])->name('postComment');
Route::put('/test/comments/update',[commentsController::class, 'updateComment']);
Route::delete('/test/comments/delete/{id}',[commentsController::class, 'deleteComment']);

Route::get('/test/comments/create', [commentsController::class, 'postComment']);
Route::get('/test/comments/update',[commentsController::class, 'updateComment']);
Route::get('/test/comments/delete/{id}',[commentsController::class, 'deleteComment']);

Route::get('/test/reactions/{id}',[reactionController::class, 'getReactions'])->name('post.getreactions');
Route::get('/test/reactions/react',[reactionController::class, 'react'])->name('post.react');
Route::get('/test/reactions/unreact',[reactionController::class, 'unreact'])->name('post.unreact');

/* ^^ Routing for postman ^^*/
