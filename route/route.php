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
//不需要验证token
Route::group('api/:version/', function () {
    //发送邮箱验证码
    Route::post('user/sendcode', 'api/:version.User/sendCode');
    //邮箱登录
    Route::post('user/emaillogin', 'api/:version.User/emailLogin');
});
/* //需要验证token
Route::group('api/:version/', function () {
    //发送邮箱验证码
    Route::post('user/sendcode', 'api/:version.User/sendCode');
    //邮箱登录
    Route::post('user/emaillogin', 'api/:version.User/emailLogin');
})->middleware(['ApiUserAuth']); */
