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


Route::get("/navigationBar","BarController@getbar");
Route::get("/banner","BannerController@getbanner");
Route::get("/link","LinkController@getlink");
Route::get("/notice/{labelld}","NoticeController@in_label");
//Route::get("/notice","NoticeController@in_time");
Route::get("/noticeDetails/{noticeld}","NoticeController@getDetails");

Route::get("/groupSynopsis/{groupId}","GroupController@queryGroupSynopsis");
Route::get("/productSynopsis/{productId}","ProductController@queryProductSynopsis");
Route::get("/activity","ActivityController@queryAllActivity");
Route::get("/leagueBuilding","MemberController@leagueBuilding");
Route::get("/member/{groupId}","MemberController@groupMember");
Route::get("/noticeList","NoticeController@noticeList");
Route::get("/noticeDetails/{id}","NoticeController@noticeDetails");
Route::get("/product","ProductController@queryAllProduct");