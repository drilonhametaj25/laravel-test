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

Route::get('/login', function () {
    return View::make('pages.login');
})->name('login');
Route::get('/registration', function () {
    return View::make('pages.registration');
});

Route::group([
    'middleware' => 'web',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'breweries'
], function ($router) {
    Route::get('', 'BreweriesController@index')->name('breweries');
});

