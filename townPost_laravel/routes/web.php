<?php

use Illuminate\Support\Facades\Route;

// controllers
use App\Http\Controllers\postsControllers;
use App\Http\Controllers\usersController;


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
Route::get('/test/posts/update', [postsControllers::class, 'updatePost']);
Route::get('/test/posts/delete', [postsControllers::class, 'deletePost']);
/* ^^ Routing for postman ^^*/
