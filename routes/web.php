<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use \App\Http\Controllers\premium;
use \App\Http\Controllers\adminController;
use \App\Http\Controllers\IndexController;
use \App\Http\Controllers\PostController;

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

//without logging
Route::get('/', [IndexController::class, 'welcome'])->name('welcome');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//must be logged in
Route::group(['middleware' => ['auth']], function () {
    Route::get('/posts/{post_id}', [PostController::class, 'show']);
    Route::get('/posts/delete/{post_id}', [PostController::class, 'DeletePost'])->name('post.delete');
    Route::get('/posts/edit/{post_id}', [PostController::class, 'EditPostForm'])->name('post.editForm');
    Route::get('/postsedit', [PostController::class, 'EditPost'])->name('post.edit');
    Route::get('/get-premium-plan/request', [premium::class, 'request'])->name('premium.request');
});


//admin routes
Route::middleware('is_admin')->group(function () {
    Route::get('/get-premium-plan/approve/{order_id}', [adminController::class, 'approve'])->name('premium.approve');
    Route::get('/get-premium-plan/cancel/{order_id}', [adminController::class, 'cancel'])->name('premium.cancel');
    Route::get('/get-premium-plan/delete/{order_id}', [adminController::class, 'delete'])->name('premium.delete');
    Route::get('/user/delete/{user_id}', [adminController::class, 'user_delete'])->name('user.delete');
});
