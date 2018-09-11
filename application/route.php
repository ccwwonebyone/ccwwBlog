<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;

Route::get('/','Index/index');          //vue页面入口

Route::group('admin',function(){
    Route::group('api',function(){
        Route::post('/send_request','Api/sendRequest');  //发送请求
        Route::resource('/','Api');             //API资源路由
    });
    Route::group('user',function(){
        Route::post('/login','User/login');     //用户登录
        Route::resource('/','User');            //用户资源路由
    });
    Route::group('database',function(){
        Route::resource('/','DataBase');    //数据库资源路由
        Route::put('/{id}/updateDB','DataBase/updateDB');
        Route::get('/get_table/:db_id','DataBase/get_table');  //获取数据库
    });

    Route::group('component',function(){
        Route::resource('/','Component');       //组件资源路由
    });

    Route::group('company',function(){
        Route::resource('/','Company');       //网站配置
    });

    Route::post('/file','Upload/upload');     //上传服务

    Route::group('page',function(){
        Route::resource('/','Page');       //页面资源路由
    });
});

Route::get('front/:name', 'Page/page');
/*return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
];
*/