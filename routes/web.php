<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ArticleController;

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

Route::get('/', [PagesController::class, 'index'])->name('homepage');

Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/condition', [PagesController::class, 'condition'])->name('condition');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::get('/finance', [PagesController::class, 'finance'])->name('finance');
Route::get('/client', [PagesController::class, 'client'])->name('client');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
