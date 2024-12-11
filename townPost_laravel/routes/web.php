<?php

use Illuminate\Support\Facades\Route;

// controllers
use App\Http\Controllers\postsControllers;
use App\Http\Controllers\usersController;
use App\Http\Controllers\commentsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\reactionController;

Route::get('/postreactions', function () {
    return view('postreactions');
});

//this is the route for the static page first this will be the first page
Route::get('/', function () {
    //return view('announcement');
    return redirect()->route('showpost');
});
//once the button comment is click or any button in the static page which is the announcement.blade.ph this modal will appear
Route::view('/modals', 'modal')->name('modals.account');

//for showing posts
Route::middleware('auth')->get('/showposts', [postsControllers::class, 'retrievePost'])->name('showpost');
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

//route to react to post
Route::post('/react', [reactionController::class, 'react']);
Route::delete('/unreact', [reactionController::class, 'unreact']);

/// routing to web test
#Route::get ('/', [postsControllers::class, 'retrievePosts']);
#Route::get('/landing', [postsControllers::class, 'showPosts'])->name('posts.index');

// routing to post
Route::get('/writePost', function (){
    return view('writepost');
})->name('writePost');

//for search post
Route::get('/searchpost', [postsControllers::class, 'searchPost']);

//for sharing posts
Route::get('/share/{postID}', [postsControllers::class, 'getPost'])->name('specificPost');

//for comments blade
Route::get('/getcomments', function (){
    return view('comments');
})->name('getcomments');

//for account redirection
Route::get('/accountView', function (){
    return view('account');
})->name('accountView');
Route::get('/account/{id}',[usersController::class, 'viewUser'])->name('retrieveAccount');

//for privacy redirection
Route::get('/privacy', function () {
    return view('privacy');
});

//for terms
Route::get('/terms', function () {
    return view('terms');
});

// error page for try catch statements and errors
Route::get('/error', function() {
    return view('errorPage', ['error_code' => "500", 'message' => "An error occured"]);
});




/* Routing for postman -- TESTING PURPOSES -- */
//routing for user.
Route::get('/test/users/{id}',[usersController::class, 'viewUser']);
Route::post('/test/users/create', [usersController::class,'createUser']);
Route::get('/test/users/login', [usersController::class,'loginUser']);
Route::put('/test/users/update', [usersController::class, 'updateUser'])->name('updateUser');
Route::delete('/test/users/delete', [usersController::class, 'deleteUser'])->name('deleteUser');

// search method
#Route::get('/test/post/search/{input}',[postsControllers::class, 'searchPost'])->name("search.post");

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

/* I feel... disappointed. I overestimated my groupmates' skills thinking that they know the basics, only to
    constantly be told something is not working, I give them the solution and it's still not working
    I have to personally fix things to make them work cause for some reason they can't understand my explanations
    now that we're past the deadline, even if I really, "really" want to fix every problem I saw while supposedly "polishing" up the
    project, I can't help but leave certain design flaws as is because of the lack of time.

    Those design flaws are going to get us in trouble with experienced PC users, but for users that are not as computer literate,
    it would pass, but obviously as third year students, those types of design flaws shouldn't be left there.
    - Shizuna
*/
