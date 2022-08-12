<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Auth;

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

Route::resource('articles', ArticleController::class);

Route::get('/catalog', [CarController::class, 'index'])->name('catalog');
Route::get('/catalog/{slug}', [CarController::class, 'category'])->name('category');
Route::get('/products/{car}', [CarController::class, 'show'])->name('products.show');

Auth::routes();

Route::get('/account', [AccountController::class, 'index'])->name('account');
