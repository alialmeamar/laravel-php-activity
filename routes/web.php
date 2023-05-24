<?php

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


//Route::get('/w', function () { return view('welcome');});

Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\MainPagesController::class, 'srch'])->name('home');
Route::get('/home', [App\Http\Controllers\MainPagesController::class, 'user'])->name('home');

Route::post('/uploadimg', [App\Http\Controllers\TopPagesController::class, 'uploadimg'])->name('home');


Route::get('/', [App\Http\Controllers\MainPagesController::class, 'srch'])->name('home');
Route::get('/{user}', [App\Http\Controllers\MainPagesController::class, 'index'])->name('home');
Route::get('/{user}/{pg}', [App\Http\Controllers\MainPagesController::class, 'PageContent'])->name('home');
Route::get('/{user}/t/{pg}', [App\Http\Controllers\TopPagesController::class, 'PageContent'])->name('home');
Route::get('/{user}/m/{pg}', [App\Http\Controllers\MainPagesController::class, 'PageContent'])->name('home');
Route::get('{user}/mp/u', [App\Http\Controllers\MainPagesController::class, 'edit'])->name('home');
Route::post('{user}/mp/amp', [App\Http\Controllers\MainPagesController::class, 'store'])->name('home');
Route::get('{user}/m/{pg}/d', [App\Http\Controllers\MainPagesController::class, 'destroy'])->name('home');
Route::get('{user}/{pg}/u', [App\Http\Controllers\MainPagesController::class, 'edit'])->name('home');
Route::PATCH('{user}/m/{pg}/u', [App\Http\Controllers\MainPagesController::class, 'update'])->name('home');



Route::get('{user}/mp/amp', [App\Http\Controllers\MainPagesController::class, 've'])->name('home');
Route::get('{user}/m/{pg}/u', [App\Http\Controllers\MainPagesController::class, 'edit'])->name('home');
//Route::get('{user}/mp/amp', [App\Http\Controllers\MainPagesController::class, 'edit'])->name('home');
Route::post('{user}/{pg}/d', [App\Http\Controllers\MainPagesController::class, 'store'])->name('home');


/////

Route::PATCH('{user}/t/{pg}/u', [App\Http\Controllers\TopPagesController::class, 'update'])->name('home');
Route::get('{user}/t/{pg}/u', [App\Http\Controllers\TopPagesController::class, 'edit'])->name('home');

////Post

Route::get('{user}/p/addpost/', [App\Http\Controllers\PostsController::class, 'create'])->name('home');

Route::post('{user}/p/addpost/', [App\Http\Controllers\PostsController::class, 'store'])->name('home');

////
Route::get('{user}/p/all/', [App\Http\Controllers\PostsController::class, 'index'])->name('home');


Route::get('{user}/p/alll/', [App\Http\Controllers\PostsController::class, 'app'])->name('home');




Route::get('{user}/p/{pg}', [App\Http\Controllers\PostsController::class, 'show'])->name('home');
Route::get('{user}/p/{pg}/u', [App\Http\Controllers\PostsController::class, 'edit'])->name('home');
Route::get('{user}/p/{pg}/d', [App\Http\Controllers\PostsController::class, 'destroy'])->name('home');
Route::PATCH('{user}/p/{pg}/s', [App\Http\Controllers\PostsController::class, 'update'])->name('home');

////////////////Profile
Route::get('{user}/profile/edit', [App\Http\Controllers\profileController::class, 'edit'])->name('home');
Route::PATCH('{user}/profile/s', [App\Http\Controllers\profileController::class, 'update'])->name('home');
Route::PATCH('{user}/profile/contact', [App\Http\Controllers\profileController::class, 'contact'])->name('home');


///////////monthly

Route::get('{user}/md/addpost/', [App\Http\Controllers\monthlydeliverableController::class, 'create'])->name('home');

Route::post('{user}/md/addpost/', [App\Http\Controllers\monthlydeliverableController::class, 'store'])->name('home');

////
Route::get('{user}/md/all/', [App\Http\Controllers\monthlydeliverableController::class, 'index'])->name('home');


Route::get('{user}/md/alll/', [App\Http\Controllers\monthlydeliverableController::class, 'app'])->name('home');




Route::get('{user}/md/{pg}', [App\Http\Controllers\monthlydeliverableController::class, 'show'])->name('home');
Route::get('{user}/md/{pg}/u', [App\Http\Controllers\monthlydeliverableController::class, 'edit'])->name('home');
Route::get('{user}/md/{pg}/d', [App\Http\Controllers\monthlydeliverableController::class, 'destroy'])->name('home');
Route::PATCH('{user}/md/{pg}/s', [App\Http\Controllers\monthlydeliverableController::class, 'update'])->name('home');
