<?php

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

Route::get('/', 'WelcomeController@index');

//cho login,logout
Auth::routes();

// Redirect to /dashboard
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::namespace ('Admin')->group(function () {
        // Controllers Within The "App\Http\Controllers\Admin" Namespace
        Route::prefix('admin')->group(function () {
            // Matches The "/admin/" URL
            Route::name('admin::')->group(function () {
                // Route assigned name "admin::"...

                Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);
               Route::resource('users', 'UserController');
            });
        });
    });
    Route::namespace ('Dashboard')->group(function () {
        // Controllers Within The "App\Http\Controllers\Dashboard" Namespace
        Route::prefix('dashboard')->group(function () {
            // Matches The "/dashboard/" URL
            Route::name('dashboard::')->group(function () {
                // Route assigned name "dashboard::"...

                Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']); 
                /**
                * Profile
                * // Route named "dashboard::profile"
                */
               Route::get('profile', ['as' => 'profile', 'uses' => 'ProfileController@showProfile']);
               Route::post('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@updateProfile']);


            });
        });
    });
});
