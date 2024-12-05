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

//this is the route for the static page first this will be the first page
Route::get('/', function () {
    return view('announcement');
});
//once the button comment is click or any button in the static page which is the announcement.blade.ph this modal will appear
Route::view('/modals', 'modal')->name('modals.account');

//Route::get('/showposts', function () {
   // $user = auth()->user(); // Get the authenticated user
   // return view('showposts', [postsControllers::class, 'retrievePosts']);
//});

Route::middleware('auth')->get('/showposts', [postsControllers::class, 'retrievePost']);
// Comments Routes
Route::get('/comments/{id}', [commentsController::class, 'viewComments'])->name('comments.view');
Route::post('/comments', [commentsController::class, 'postComment'])->name('comments.create');
Route::put('/comments', [commentsController::class, 'updateComment'])->name('comments.update');
Route::delete('/comments/{id}', [commentsController::class, 'deleteComment'])->name('comments.delete');

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


/// routing to web test
#Route::get ('/', [postsControllers::class, 'retrievePosts']);
#Route::get('/landing', [postsControllers::class, 'showPosts'])->name('posts.index');

// routing to post
Route::get('/writePost', function (){
    return view('writepost');
})->name('writePost');

//routing to search
Route::get('/search.post', [PostController::class, 'searchPost']);

//for comments blade
Route::get('/getcomments', function (){
    return view('comments');
})->name('getcomments');




/* Routing for postman -- TESTING PURPOSES -- */
//routing for user.
Route::get('/test/users/{id}',[usersController::class, 'viewUser']);
Route::post('/test/users/create', [usersController::class,'createUser']);
Route::get('/test/users/login', [usersController::class,'loginUser']);
Route::put('/test/users/update', [usersController::class, 'updateUser']);
Route::delete('/test/users/delete', [usersController::class, 'deleteUser']);

// search method
Route::get('/test/post/search/{input}',[postsControllers::class, 'searchPost'])->name("search.post");

//routing for comment
Route::get('/test/comments/{id}',[commentsController::class, 'viewComments'])->name('comments.get');
Route::get('/test/comments/{id}',[commentsController::class, 'viewComments'])->name('comment.view');
Route::post('/test/comments/create', [commentsController::class, 'postComment'])->name('postComment');
Route::put('/test/comments/update',[commentsController::class, 'updateComment']);
Route::delete('/test/comments/delete/{id}',[commentsController::class, 'deleteComment']);

//routing for posts
Route::get ('/test/posts/retrieve', [postsControllers::class, 'retrievePosts'])->name('retrievePosts');
Route::get('/test/posts/{id}', [postsControllers::class, 'getPost'])->name('getPost');
#Route::get ('/', [postsControllers::class, 'retrievePost'])->name('retrievePost');
Route::get('/test/posts/{id}', [postsControllers::class, 'getPost'])->name('getPost');
Route::post('/test/posts/create', [postsControllers::class, 'createPost'])->name('createPost');;
Route::put('/test/posts/update/{id}', [postsControllers::class, 'updatePost'])->name('updatePost');
Route::delete('/test/posts/delete/{id}', [postsControllers::class, 'deletePost'])->name('deletePost');
Route::get('/token', function(){
    return csrf_token();
});

//routing for reactions
Route::get('/test/reactions/{id}',[reactionController::class, 'getReactions'])->name('post.getreactions');
Route::get('/test/reactions/react',[reactionController::class, 'react'])->name('post.react');
Route::get('/test/reactions/unreact',[reactionController::class, 'unreact'])->name('post.unreact');


Route::post('/test/comments/create', [commentsController::class, 'postComment'])->name('comments.post');
Route::get('/test/comments/create', [commentsController::class, 'postComment']);
Route::get('/test/comments/update',[commentsController::class, 'updateComment']);
Route::get('/test/comments/delete/{id}',[commentsController::class, 'deleteComment']);


/* ^^ Routing for postman ^^*/
