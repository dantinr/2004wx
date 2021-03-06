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

Route::get('/rand',function (){
    echo mt_rand(1,42);
});


Route::get('/info',function (){
    phpinfo();
});


//Route::post('/wx','WxController@wxEvent');        //接收事件推送
//Route::get('/wx/token','WxController@getAccessToken');        //获取access_token

Route::prefix('/wx')->group(function(){
    Route::get('/','WxController@index');       //接入
    Route::post('/','WxController@wxEvent');
    Route::get('/token','WxController@getAccessToken');        //获取access_token
    Route::get('/create_menu','WxController@createMenu');        //创建菜单
    Route::get('/upload_media','WxController@uploadMedia');        //上传素材
    Route::get('/send_all','WxController@sendAll');         //群发消息

});

// TEST 路由分组
Route::prefix('/test')->group(function (){
    Route::get('/json',"TestController@json");        //  /test/guzzle1
    Route::get('/guzzle1',"TestController@guzzle1");        //  /test/guzzle1
    Route::get('/guzzle2',"WxController@guzzle2");        //  /test/guzzle1
    Route::get('/guzzle3',"TestController@guzzle3");        //  /test/guzzle1
    Route::get('/media',"WxController@dlMedia");        //  /test/guzzle1

});
