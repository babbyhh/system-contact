<?php

use App\Http\Controllers\ContactController;
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
    return view('index', ['name' => 'Bárbara']);
});
Route::get('/contact', 'ContactController@index')->name('contact_index');


Route::name('auth.')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('login', 'AuthController@getLogin')->name('get-login');
        Route::post('login', 'AuthController@login')->name('login');
    });
    

    Route::get('logout', 'AuthController@logout')
        ->middleware('auth')
        ->name('logout');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/criar',  'ContactController@getCreate')->name('get-contact_create');
        Route::post('/store',  'ContactController@store')->name('contact_store');
        Route::get('/edit/{id}',  'ContactController@edit')->name('contact_edit');
        Route::post('/update/{id}',  'ContactController@update')->name('contact_update');
        Route::post('/destroy/{id}',  'ContactController@destroy')->name('contact_destroy');
        Route::get('/show/{id}',  'ContactController@show')->name('contact_show');
});