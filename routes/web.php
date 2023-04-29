<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::get ('/', [App\Http\Controllers\PagesController::class, 'index'])->name('welcome');
Route::get('/landing', [App\Http\Controllers\PagesController::class, 'landing'])->name('landing');
Route::get('/contact', [App\Http\Controllers\PagesController::class, 'contact'])->name('contact');
Route::post('/contact/sendmail', [App\Http\Controllers\PagesController::class, 'sendmail'])->name('sendmail');
// Route::get('/postcard', [App\Http\Controllers\UsersController::class, 'singlepostcard'])->name('singlepostcard');
Route::get('/postcard/sharerspost/{id}/socialsheredpost', [App\Http\Controllers\PagesController::class, 'singlepostcard'])->name('singlepostcard');


// Route::get('/pages/{slug}', [App\Http\Controllers\PagesController::class, 'show'])->name('page.show');




Route::get('/email/verify', function () {
	return view('auth.verify-email');})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
	$request->fulfill();
	return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');	


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin-dashboard')->group(function(){
	Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('adminDashboard');

	Route::get('/status/{id}', [App\Http\Controllers\AdminController::class, 'status'])->name('status');

	Route::get('/fansprofile/{user:first_name}', [App\Http\Controllers\AdminController::class, 'showfanpage'])->name('fansprofile');
	Route::get('/fans', [App\Http\Controllers\AdminController::class, 'showfans'])->name('fans.list');
	Route::get('/fans/create', [App\Http\Controllers\AdminController::class, 'create'])->name('fan.create');
    Route::post('/fans', [App\Http\Controllers\AdminController::class, 'store'])->name('fan.store');

	Route::get('/fans/{id}', [App\Http\Controllers\AdminController::class, 'fanedit'])->name('fan.edit');
    Route::patch('/fans/{id}', [App\Http\Controllers\AdminController::class, 'fanupdate'])->name('fan.update');

    Route::delete('/fans/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('fan.delete');

	Route::get('/adminprofile', [App\Http\Controllers\AdminController::class, 'profileedit'])->name('adminprofile.edit');
	Route::patch('/adminprofile', [App\Http\Controllers\AdminController::class, 'profileupdate'])->name('adminprofile.update');

	Route::get('/postcards', [App\Http\Controllers\AdminController::class, 'postcards'])->name('postcards');
	
	Route::post('/postcard', [App\Http\Controllers\PostcardController::class, 'storePostcard'])->name('create.postcards');
	Route::get('/delete-postcard/{postcard_id}', [App\Http\Controllers\PostcardController::class, 'deletePostcard'])->name('delete.postcards')->middleware('auth');
	
	Route::patch('/postcard/{id}', [App\Http\Controllers\PostcardController::class, 'updatePostcard'])->name('update.postcards');
	Route::post('/postcard/{id}/comment', [App\Http\Controllers\CommentController::class, 'storeComment'])->name('postcard.comments');


	Route::get('/pages',[App\Http\Controllers\PagesController::class,'showpages'])->name('pages.all');
	Route::get('/pages/create',[App\Http\Controllers\PagesController::class,'create'])->name('page.create');
	Route::post('/pages/store',[App\Http\Controllers\PagesController::class,'store'])->name('page.store');
	Route::get('/page/{id}', [App\Http\Controllers\PagesController::class, 'edit'])->name('page.edit');
	Route::patch('/pages/{id}', [App\Http\Controllers\PagesController::class, 'update'])->name('page.update');
	Route::delete('/pages/{id}', [App\Http\Controllers\PagesController::class, 'destroy'])->name('page.delete')->middleware('auth');

});


Route::prefix('myfanshub')->group(function(){
	Route::get('/', [App\Http\Controllers\UsersController::class, 'index'])->name('userDashboard')->middleware(['auth', 'verified']);

	Route::get('/myfans/{user:first_name}', [App\Http\Controllers\UsersController::class, 'show'])->name('fanprofile');

	Route::get('/profile', [App\Http\Controllers\UsersController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [App\Http\Controllers\UsersController::class, 'update'])->name('profile.update');

	Route::get('/postcard', [App\Http\Controllers\UsersController::class, 'postcard'])->name('postcard');
	
	Route::post('/postcard', [App\Http\Controllers\PostcardController::class, 'storePostcard'])->name('create.postcard');
	Route::get('/delete-postcard/{postcard_id}', [App\Http\Controllers\PostcardController::class, 'deletePostcard'])->name('delete.postcard')->middleware('auth');
	
	Route::patch('/postcard/{id}', [App\Http\Controllers\PostcardController::class, 'updatePostcard'])->name('update.postcard');
	Route::post('/postcard/{id}/comment', [App\Http\Controllers\CommentController::class, 'storeComment'])->name('postcard.comment');

	Route::post('/postcard/like', [App\Http\Controllers\LikeController::class, 'store'])->name('postcard.like');

	Route::get('/informtion', [App\Http\Controllers\PagesController::class, 'information'])->name('information');

});


Route::get('/{slug}', [App\Http\Controllers\PagesController::class, 'show'])->name('page.show');