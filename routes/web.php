<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\PostLikesController;
use App\Http\Controllers\UserNotificationsController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\ReportController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [PostController::class, 'index'])->name('posts');
Route::middleware('auth')->group( function() {
    Route::post('/post', [PostController::class, 'store']);
    Route::get('/post/{post}', [PostController::class, 'show']);
    Route::delete('/post/{post}', [PostController::class, 'destroy']);
    // Route::get('/', [PostController::class, 'index'])->name('posts');
    
    Route::get('/profiles/{user:username}/follow', [FollowsController::class, 'store']);
    Route::get('/profiles/{user:username}/edit', [ProfileController::class, 'edit'])
            ->middleware('can:edit,user');

    Route::patch('/profiles/{user:username}', [ProfileController::class, 'update']);

    Route::get('/explore', [ExploreController::class, 'index'])->name('explore');    
    Route::post('/search', [ExploreController::class, 'search'])->name('search');    

    Route::post('/post/{post}/like', [PostLikesController::class, 'store']);
    Route::delete('/post/{post}/like', [PostLikesController::class, 'destroy']);
    
    Route::post('/post/{post}/comment', [PostCommentsController::class, 'store']);
    Route::delete('/post/{post}/comment/{comment}', [PostCommentsController::class, 'destroy']);


    Route::get('/notifications', [UserNotificationsController::class, 'index'])->name('notifications');    

    Route::post('/report/{post}', ReportController::class);
});

Route::get('/profiles/{user:username}', [ProfileController::class, 'show'])->name('profile');

require __DIR__.'/auth.php';
