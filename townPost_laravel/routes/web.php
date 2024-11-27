<?php

use Illuminate\Support\Facades\Route;

// controllers
use App\Http\Controllers\postsControllers;
use App\Http\Controllers\usersController;
use App\Http\Controllers\commentsController;
use App\Http\Controllers\reactionController;


Route::get('/', function () {
    return view('announcement');
});

/* Routing for postman -- TESTING PURPOSES -- */
Route::get('/test/users/{id}',[usersController::class, 'viewUser']);
Route::get('/test/users/create', [usersController::class,'createUser']);
Route::get('/test/users/login', [usersController::class,'loginUser']);
Route::get('/test/users/update', [usersController::class, 'updateUser']);
Route::get('/test/users/delete', [usersController::class, 'deleteUser']);

Route::get ('/test/posts', [postsControllers::class, 'retrievePosts']);
Route::get('/test/posts/{id}', [postsControllers::class, 'getPost']);
Route::get('/test/posts/create', [postsControllers::class, 'createPost']);
Route::get('/test/posts/update/{id}', [postsControllers::class, 'updatePost']);
Route::get('/test/posts/delete/{id}', [postsControllers::class, 'deletePost']);

Route::get('/test/comments/{id}',[commentsController::class, 'viewComments']);
Route::get('/test/comments/create', [commentsController::class, 'postComment']);
Route::get('/test/comments/update',[commentsController::class, 'updateComment']);
Route::get('/test/comments/delete/{id}',[commentsController::class, 'deleteComment']);

Route::get('/test/reactions/{id}',[reactionController::class, 'getReactions']);
Route::get('/test/reactions/react',[reactionController::class, 'react']);
Route::get('/test/reactions/unreact',[reactionController::class, 'unreact']);
/* ^^ Routing for postman ^^*/
