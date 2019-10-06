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
Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', array('as'=>'login', function () {
    return view('login');
}));
Route::get('/signup', array('as'=>'signup', function () {
    return view('signup');
}));

// web routes
Route::group([
    'middleware' => ['web']
], function () {
    Route::get('/professionals/list', array('as'=>'professionals.list', function () {
        return view('professionals.list');
    }));
    Route::get('/professionals/add', array('as'=>'professionals.add', function () {
        return view('professionals.form');
    }));
    Route::get('/professionals/edit/{id}', array('as'=>'professionals.edit', function () {
        return view('professionals.form');
    }));
    Route::get('/charts', array('as'=>'charts', function () {
        return view('professionals.charts');
    }));
});


// oauth
Route::get('login/{driver}', 'Auth\AuthController@redirectToProvider')->name('login.provider')
    ->where('driver', implode('|', config('auth.socialite.drivers')));
Route::get('login/{driver}/callback', 'Auth\AuthController@handleProviderCallback')->name('login.provider.callback')
    ->where('driver', implode('|', config('auth.socialite.drivers')));

Route::get('login/google', 'Auth\AuthController@redirectToProviderGoogle');
Route::get('login/google/callback', 'Auth\AuthController@handleProviderCallbackGoogle');
