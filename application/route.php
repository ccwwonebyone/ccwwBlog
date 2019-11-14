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

Route::get('','index/home');          //web页面入口
Route::get('article/:id', 'Index/article');
Route::get('category_article/:id', 'Index/categoryArticle');
Route::get('tag_article/:id', 'Index/tagArticle');
Route::get('tag/:id', 'Index/tag');
Route::get('vue', 'Index/index');    //vue页面入口
Route::group('admin',function(){

    Route::group('api',function(){
        Route::post('/send_request','Api/sendRequest');  //发送请求
        Route::resource('/','Api');             //API资源路由
    });


    Route::group('user',function(){
        Route::put('/update_password', 'User/updatePassword');  //修改密码
        Route::post('/login','User/login');     //用户登录
        Route::resource('/','User');            //用户资源路由
        Route::post('/login_out', 'User/loginOut'); //用户登出
    });
    Route::get('profile', 'User/userInfo'); //用户信息


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

    Route::group('article', function(){
        Route::resource('/', 'Article');    //文章编辑
    });

    Route::post('/file','Upload/upload');     //上传服务

    Route::group('page',function(){
        Route::resource('/','Page');       //页面资源路由
    });

    Route::group('category',function(){
        Route::resource('/','Category');       //分类资源路由
    });

    Route::group('tag',function(){
        Route::resource('/','Tag');       //标签资源路由
    });


});

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
