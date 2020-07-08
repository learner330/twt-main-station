<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::get("/theme","ThemeController@gettheme");

Route::get("/twtSynopsis",function(){
    $content=DB::table('twt_synopsis')->first()->value('content');
    return $content;
});

Route::get("/navigationFirstBar","BarController@firstbar");
Route::get("/navigationSecondBar","BarController@secondbar");
Route::get("/banner","BannerController@getbanner");
Route::get("/link","LinkController@getlink");
Route::get("/notice/{labelld}","NoticeController@in_label");
Route::get("/notice","NoticeController@in_time");