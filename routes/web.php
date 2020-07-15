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
            Route::delete('/self', 'LinkController@deleteLink');
            Route::get('/self/{id}', 'LinkController@updateLink');
            Route::put('/self/{id}', 'LinkController@updateLink');
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

        Route::group(['prefix'=>'league'], function(){
            Route::get('/','LeagueBuildingController@getAllPhotos');
            Route::get('/self','LeagueBuildingController@addPhoto');
            Route::post('/self','LeagueBuildingController@addPhoto');
            Route::delete('/self', 'LeagueBuildingController@deletePhoto');
            //TODO
            Route::get('/self/{id}', 'LeagueBuildingController@updatePhoto');
            Route::put('/self/{id}', 'LeagueBuildingController@updatePhoto');
        });

        Route::group(['prefix'=>'synopsis'], function(){
            Route::get('/','SynopsisController@getSynopsis');
            Route::get('/self', 'SynopsisController@updateSynopsis');
            Route::put('/self', 'SynopsisController@updateSynopsis');
        });

        Route::group(['prefix'=>'activity'], function(){
            Route::get('/','ActivityController@getAllActivities');
            Route::get('/self','ActivityController@addActivity');
            Route::post('/self','ActivityController@addActivity');
            Route::delete('/self', 'ActivityController@deleteActivity');
            //TODO
            Route::get('/self/{id}', 'ActivityController@updateActivity');
            Route::put('/self/{id}', 'ActivityController@updateActivity');
        });

        Route::group(['prefix'=>'label'], function(){
            Route::get('/','LabelController@getAllLabel');
            Route::get('/self','LabelController@addLabel');
            Route::post('/self','LabelController@addLabel');
            Route::delete('/self', 'LabelController@deleteLabel');
        });

        Route::group(['prefix'=>'notice'], function(){
            Route::get('/','NoticeController@getAllNotice');
            Route::get('/self','NoticeController@addNotice');
            Route::post('/self','NoticeController@addNotice');
            Route::delete('/self', 'NoticeController@deleteNotice');
            //TODO
            Route::get('/self/{id}', 'NoticeController@updateNotice');
            Route::put('/self/{id}', 'NoticeController@updateNotice');
        });

        Route::group(['prefix'=>'product'], function(){
            Route::get('/','ProductController@getAllProduct');
            Route::get('/self','ProductController@addProduct');
            Route::post('/self','ProductController@addProduct');
            Route::delete('/self', 'ProductController@deleteProduct');
            //TODO
            Route::get('/self/{id}', 'ProductController@updateProduct');
            Route::put('/self/{id}', 'ProductController@updateProduct');
        });

    });
});




