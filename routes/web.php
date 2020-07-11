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
    return view('welcome');
});

Auth::routes();

Route::get('/test', function (){
    return redirect('/admin-lte/index.html');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace'=>'Admin'], function (){
    Route::group(['middleware' => 'auth'], function(){
        Route::group(['prefix' => 'navigation'], function (){
            Route::get('/', 'NavigationController@getAllNavigations');
            Route::get('firstNavigation', 'NavigationController@addFirstNavigation');
            Route::post('firstNavigation', 'NavigationController@addFirstNavigation');
            Route::put('firstNavigation/{id}', 'NavigationController@updateFirstNavigation');
            Route::delete('firstNavigation', 'NavigationController@deleteFirstNavigation');
            Route::get('secondNavigation/{fid}', 'NavigationController@addSecondNavigation');
            Route::post('secondNavigation/{fid}', 'NavigationController@addSecondNavigation');
            Route::put('secondNavigation/{id}', 'NavigationController@updateSecondNavigation');
            Route::delete('secondNavigation', 'NavigationController@deleteSecondNavigation');
            Route::get('first/{id}', 'NavigationController@updateFirstNavigation');
            Route::get('second/{id}', 'NavigationController@updateSecondNavigation');
        });
    });
});




