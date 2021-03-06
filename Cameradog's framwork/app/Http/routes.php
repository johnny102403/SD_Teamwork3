<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//main index site
Route::get('/', function () {
    // return view('auth.login');
    return redirect('main');
});

//all main sites
Route::resource('main', 'MainController');

//for login and register site
Route::controllers([
    'auth' => 'Auth\AuthController',
    // 'password' => 'Auth\PasswordController',
]);

//refresh index site content
Route::get('refresh', 'MainController@indexRefresh');
