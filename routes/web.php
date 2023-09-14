<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
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
    if (Auth::user()) {
        return redirect()->route('sa_list_post');
    } else {
        return redirect()->route('login');
    }
})->name('sa_home');

// Route::get('/users', [UserController::class, 'showUser'])->name('sa_show_user')->middleware('auth');

Route::get('/users/create', [UserController::class, 'actionCreateUser'])->name('sa_create_user')->middleware('auth');
Route::post('/users/store', [UserController::class, 'storeUser'])->name('sa_store_user')->middleware('auth');
Route::group(['middleware' => 'checkUserIdExists'], function () {
    Route::get('/users/{id}/edit', [UserController::class, 'editUser'])->name('sa_user_edit')->middleware('auth');
    Route::post('/users/{id}/update', [UserController::class, 'updateUser'])->name('sa_user_update')->middleware('auth');
    Route::get('/users/{id}/delete', [UserController::class, 'deleteUser'])->name('sa_user_delete')->middleware('auth');
    Route::get('/users/{id}/detail', [UserController::class, 'detailUser'])->name('sa_user_detail')->middleware('auth');
});

Route::get('/feed', [PostController::class, 'showPostList'])->name('sa_list_post');
Route::get('/posts/create', [PostController::class, 'createPost'])->name('sa_create_post')->middleware('auth');
Route::post('/posts/store', [PostController::class, 'storePost'])->name('sa_store_post');
Route::get('/posts/{id}/edit', [PostController::class, 'editPost'])->name('sa_edit_post');
Route::post('/posts/{id}/update', [PostController::class, 'updatePost'])->name('sa_update_post');
Route::get('/posts/delete/{id}', [PostController::class, 'deletePost'])->name('sa_delete_post');
Route::get('/posts/detail/{id}', [PostController::class, 'detailPost'])->name('sa_detail_post');
Route::get('/posts/download/{id}', [PostController::class, 'pdfDownloadPost'])->name('sa_download_post');

Route::post('/posts/{postId}/comments', [CommentController::class, 'addComment'])->name('sa_add_comment');
Route::get('/comments/delete/{id}', [CommentController::class, 'deleteComment'])->name('sa_delete_comment');
Route::post('/comments/edit/{id}', [CommentController::class, 'editComment'])->name('sa_edit_comment');

Route::get('/dashboard', [DashboardController::class, 'showChart'])->name('sa_dashboard');
Route::get('/503', function () {
    return view('errors/503');
});
Route::get('/406', function () {
    return view('errors/406');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
