<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;

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

Route::get('/',[ArticleController::class, 'home']);
Route::get('/articles',[ArticleController::class, 'index']);
Route::get('/articles/add',[ArticleController::class,'add']);
Route::post('/articles/add',[ArticleController::class, 'create']);
Route::get('/articles/detail/{id}',[ArticleController::class,'detail']);
Route::get('/comment/add',[CommentController::class, 'add']);
Route::post('/comment/add',[CommentController::class, 'create']);
Route::get('/comment/delete/{id}',[CommentController::class, 'delete']);
Route::get('/category/{id}',[CategoryController::class, 'show']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
