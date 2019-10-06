<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// auth
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'Auth\LoginController@login')->name('api.login');
    Route::post('signup', 'Auth\RegisterController@signup')->name('api.signup');

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', 'Auth\AuthController@logout');
        Route::get('user', 'Auth\AuthController@user');
    });
});

Route::group(['middleware' => 'auth:api'], function () {
    // professionals
    Route::get('professionals/{professional}', 'Api\ProfessionalController@get');
    Route::get('professionals', 'Api\ProfessionalController@getAll');
    Route::post('professionals', 'Api\ProfessionalController@create');
    Route::put('professionals/{professional}', 'Api\ProfessionalController@update');
    Route::delete('professionals/{professional}', 'Api\ProfessionalController@delete');
    Route::delete('professionals', 'Api\ProfessionalController@deleteAll');

    // Cbos
    Route::get('cbos', 'Api\CboController@getAll');
    // Bonds
    Route::get('bonds', 'Api\BondController@getAll');
    // Types
    Route::get('types', 'Api\TypeController@getAll');

    // charts
    Route::get('charts/bonds', 'Api\ChartController@bonds');
    Route::get('charts/types', 'Api\ChartController@types');

    // scrap
    Route::get('scrap', 'Api\ScrapController@scrap');
});
