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

Route::resource('product','Product');
Route::resource('database','DataBaseController');
Route::post('login','UserController/login');
Route::get('test','DataBaseController');

// Route::resource('api','ApiController');     //API资源路由
Route::group('api',function(){
    Route::post('/sendRequest','Api/sendRequest');     //API资源路由
    Route::resource('/','Api');
});
Route::group('user',function(){
    Route::post('/login','User/login');     //API资源路由
    Route::resource('/','User');
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