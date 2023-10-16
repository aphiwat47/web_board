<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

///////////////////////////Admin///////////////////////////////////////////////////
Route::get ('admin/home',[HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('admin/search', [App\Http\Controllers\AdminController::class, 'searchadmin'])->name('admin.search')->middleware('is_admin');
//profile
Route::get('admin/{id}/manageprofile', [App\Http\Controllers\AdminController::class, 'show'])->name('manage.profile')->middleware('is_admin');
Route::get('admin/{id}/manageprofile/edit', [App\Http\Controllers\AdminController::class, 'editprofile'])->name('ad.edit.profile')->middleware('is_admin');
Route::put('admin/{id}/manageprofile/update', [App\Http\Controllers\AdminController::class, 'updateprofile'])->name('ad.update.profile')->middleware('is_admin');
Route::delete('admin/{id}/manageprofile/delete', [App\Http\Controllers\AdminController::class, 'deluser'])->name('ad.delete.user')->middleware('is_admin');
//post
Route::get('admin/{id}/post/edit', [App\Http\Controllers\AdminController::class, 'editpost'])->name('ad.edit.post')->middleware('is_admin');
Route::put('admin/{id}/post/update', [App\Http\Controllers\AdminController::class, 'updatepost'])->name('ad.update.post')->middleware('is_admin');
Route::delete('admin/{id}/post/delete', [App\Http\Controllers\AdminController::class, 'deletepost'])->name('ad.delete.post')->middleware('is_admin');
//comment
Route::get('admin/{id}/post/ManageComment', [App\Http\Controllers\AdminController::class, 'managecomm'])->name('ad.manage.comm')->middleware('is_admin');
Route::get('admin/comment/{id}/edit', [App\Http\Controllers\AdminController::class, 'editcomm'])->name('ad.edit.comm')->middleware('is_admin');
Route::put('admin/comment/{id}/update', [App\Http\Controllers\AdminController::class, 'updatecomm'])->name('ad.update.comm')->middleware('is_admin');
Route::delete('admin/comment/{id}/delete', [App\Http\Controllers\AdminController::class, 'deletecomm'])->name('ad.delete.comm')->middleware('is_admin');
//categories
Route::get('admin/categories', [App\Http\Controllers\AdminController::class, 'categoryhome'])->name('category.home')->middleware('is_admin');
Route::get('admin/categories/create', [App\Http\Controllers\AdminController::class, 'categorycreate'])->name('category.create')->middleware('is_admin');
Route::post('admin/categories/store', [App\Http\Controllers\AdminController::class, 'categorystore'])->name('category.store')->middleware('is_admin');
Route::get('admin/categories/{id}/edit', [App\Http\Controllers\AdminController::class, 'categoryedit'])->name('category.edit')->middleware('is_admin');
Route::put('admin/categories/{id}/update', [App\Http\Controllers\AdminController::class, 'categoryupdate'])->name('category.update')->middleware('is_admin');
////////////////////////////User///////////////////////////////////////////////////
//Route::resource('home',HomeController::class);
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('home/search', [App\Http\Controllers\HomeController::class, 'search'])->name('home.search');

//post
Route::get('post/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create')->middleware('auth');
Route::post('post/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store')->middleware('auth');
Route::get('post/{id}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit')->middleware('auth');
Route::put('post/{id}/update', [App\Http\Controllers\PostController::class, 'update'])->name('post.update')->middleware('auth');
Route::delete('post/{id}/delete', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.delete')->middleware('auth');

//profile
Route::get('home/{id}/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show')->middleware('auth');
Route::get('home/{id}/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::put('home/{id}/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

//comment
Route::get('home/post/{id}/comment', [App\Http\Controllers\CommentController::class, 'index'])->name('comment.index');
Route::get('home/post/{id}/comment/create', [App\Http\Controllers\CommentController::class, 'create'])->name('comment.create')->middleware('auth');
//Route::get('home/post/{id}/comment/create', [App\Http\Controllers\CommentController::class, 'create'])->name('comment.create')->middleware('auth');
Route::post('home/post/{id}/comment/store', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.store')->middleware('auth');
Route::get('home/comment/{id}/edit', [App\Http\Controllers\CommentController::class, 'edit'])->name('comment.edit')->middleware('auth');
Route::put('home/comment/{id}/update', [App\Http\Controllers\CommentController::class, 'update'])->name('comment.update')->middleware('auth');
Route::delete('home/comment/{id}/delete', [App\Http\Controllers\CommentController::class, 'destroy'])->name('comment.delete')->middleware('auth');

//test
Route::get('/reset-password/page', 'App\Http\Controllers\HomeController@showResetForm')->name('password.reset');
Route::post('/reset-password/update', 'App\Http\Controllers\HomeController@updatepassword')->name('password.update');

