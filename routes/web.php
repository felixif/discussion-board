<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageUploadController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profiles/{user?}', function($user = null) {
    return view('profile',['user'=>$user]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/**
 * Routes for the user model
 */

Route::get('/users', [UserController::class, 'index'])
    ->name('users.index');

Route::get('/users/{user}', [UserController::class, 'show'])
    ->name('users.show');

Route::get('/users/{user}/edit', [UserController::class, 'edit'])
    ->name('users.edit');

Route::put('/users/{user}', [UserController::class, 'update'])
    ->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])
    ->name('users.destroy');


/**
 * Routes for the post model
 */

Route::get('/posts', [PostController::class, 'index'])
    ->name('posts.index');

Route::get('/posts/create', [PostController::class, 'create'])
    ->name('posts.create');

Route::post('/posts', [PostController::class, 'store'])
    ->name('posts.store');

Route::get('/posts/{post}', [PostController::class, 'show'])
    ->name('posts.show');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
    ->name('posts.edit');

Route::put('/posts/{post}', [PostController::class, 'update'])
    ->name('posts.update');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])
    ->name('posts.destroy');

/**
 * Routes for the comment model
 */

Route::get('/comments', [CommentController::class, 'index'])
    ->name('comments.index');

Route::get('/comments/create/{post}', [CommentController::class, 'create'])
    ->name('comments.create');

Route::post('/comments/{post}', [CommentController::class, 'store'])
    ->name('comments.store');

Route::get('/comments/{comment}', [CommentController::class, 'show'])
    ->name('comments.show');

Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])
    ->name('comments.edit');

Route::put('/comments/{comment}', [CommentController::class, 'update'])
    ->name('comments.update');

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
    ->name('comments.destroy');



require __DIR__.'/auth.php';

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * Routes for image uploading
 */