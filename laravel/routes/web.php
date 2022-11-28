<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\MailController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PlaceController;

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

Route::get('/', function (Request $request) {
    $message = 'Loading welcome page';
    Log::info($message);
    $request->session()->flash('info', $message);
    return view('welcome');
});

Auth::routes();
require __DIR__.'/email-verify.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('mail/test', [MailController::class, 'test']);

Route::get('/language/{locale}', [App\Http\Controllers\LanguageController::class, 'language']);

Route::resource('files', FileController::class)
    ->middleware(['auth', 'permission:files']);

Route::resource('posts', PostController::class);

Route::resource('places', PlaceController::class)
    ->middleware(['auth', 'permission:places']);

Route::post('/posts/{post}/like', [App\Http\Controllers\PostController::class, 'like'])->name('posts.like');
Route::delete('/posts/{post}/like', [App\Http\Controllers\PostController::class, 'unlike'])->name('posts.unlike');

Route::post('/places/{place}/favorite', [App\Http\Controllers\PlaceController::class, 'favorite'])->name('places.favorite');
Route::delete('/places/{place}/favorite', [App\Http\Controllers\PlaceController::class, 'unfavorite'])->name('places.unfavorite');