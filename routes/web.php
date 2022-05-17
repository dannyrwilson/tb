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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/wall', [App\Http\Controllers\WallController::class, 'index'])->name('wall');

Route::get('media', [App\Http\Controllers\MediaController::class, 'index']);
Route::post('media', [App\Http\Controllers\MediaController::class, 'store']);

Route::post('comment', [App\Http\Controllers\CommentController::class, 'store']);