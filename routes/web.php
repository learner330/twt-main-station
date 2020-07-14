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

        Route::group(['prefix'=>'link'], function(){
            Route::get('/','LinkController@getAllLinks');
            Route::get('/self','LinkController@addLink');
            Route::post('/self','LinkController@addLink');
            Route::get('/self/{id}', 'LinkController@updateLink');
            Route::put('/self/{id}', 'LinkController@updateLink');
            Route::delete('/self', 'LinkController@deleteLink');
        });

        Route::group(['prefix'=>'banner'], function(){
            Route::get('/','BannerController@getAllBanners');
            Route::get('/self','BannerController@addBanner');
            Route::post('/self','BannerController@addBanner');
            Route::delete('/self', 'BannerController@deleteBanner');
            //TODO
            Route::get('/self/{id}', 'BannerController@updateBanner');
            Route::put('/self/{id}', 'BannerController@updateBanner');
        });

        Route::group(['prefix'=>'member'], function(){
            Route::get('/{gid}', 'MemberController@getMembersByGroup');
            Route::get('/new/{gid}', 'MemberController@addMember');
            Route::post('/new/{gid}','MemberController@addMember');
            Route::delete('/self','MemberController@deleteMember');
            //TODO
            Route::get('/self/{gid}', 'MemberController@updateMember');
            Route::put('/self/{gid}', 'MemberController@updateMember');
        });


    });
});




