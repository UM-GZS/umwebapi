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
//不需要token验证
Route::group('api/:version/',function(){
    Route::post('user/sendcode','api/:version.User/sendCode');
    Route::post('user/phonelogin','api/:version.User/phoneLogin');
});
//需要token验证
Route::group('api/:version/',function(){
    Route::post('user/login','api/:version.User/login');
})->middleware(['ApiUserAuth']);
