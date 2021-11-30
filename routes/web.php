<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/users/{id}', [UserController::class, 'show'])
    ->name('users.show');

Route::get('/users/{id}/edit', [UserController::class, 'edit'])
    ->name('users.edit');

Route::put('/users/{id}', [UserController::class, 'update'])
    ->name('users.update');


/**
 * Routes for the post model
 */

Route::get('/posts', [PostController::class, 'index'])
    ->name('posts.index');

Route::get('/posts/create', [PostController::class, 'create'])
    ->name('posts.create');

Route::post('/posts', [PostController::class, 'store'])
    ->name('posts.store');

Route::get('/posts/{id}', [PostController::class, 'show'])
    ->name('posts.show');

require __DIR__.'/auth.php';
