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

Route::get('/clear-cache', function() {
    $run = Artisan::call('config:clear');
    $run = Artisan::call('cache:clear');
    $run = Artisan::call('config:cache');
    return 'FINISHED';
});

Route::get('/storage-link', function() {
    $run = Artisan::call('storage:link');
    return 'FINISHED';  
});

Route::get('/key-generate', function() {
    $run = Artisan::call('key:generate');
    return 'FINISHED';
});

Route::get('/migrate', function() {
    $run = Artisan::call('migrate');
    return 'FINISHED';  
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('applications','ApplicationController');

Route::get('/', 'ApplicationController@create')->name('applications.create');
Route::post('applications', 'ApplicationController@store')->name('applications.store');
Route::get('applications/{application}', 'ApplicationController@show')->name('applications.show');
Route::get('applications/{application}/download', 'ApplicationController@download')->name('applications.download');

Route::prefix('admin')->namespace('Admin')->as('admin.')->group(function() {
    Route::get('/','LoginController@showLoginForm');
    Route::get('/login','LoginController@showLoginForm')->name('login');
    Route::post('/login','LoginController@login');

    Route::group(['middleware' => ['auth:admin']], function() {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

        Route::post('/logout','LoginController@logout')->name('logout');

        Route::get('applications/index', 'ApplicationController@index')->name('applications.index');
        Route::post('applications/getData', 'ApplicationController@getData')->name('applications.data');
        Route::get('applications/{application}', 'ApplicationController@show')->name('applications.show');
    });
});