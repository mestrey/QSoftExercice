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
    return view('pages.homepage');
});

Route::get('/about', function () {
    return view('pages.informations.about');
});

Route::get('/condition', function () {
    return view('pages.informations.condition');
});

Route::get('/contact', function () {
    return view('pages.informations.contact');
});

Route::get('/finance', function () {
    return view('pages.informations.finance');
});

Route::get('/client', function () {
    return view('pages.informations.client');
});
