<?php

namespace app\common\model;

use think\Model;
use think\facade\Cache;
use app\lib\exception\BaseException;

class User extends Model
{
    //发送验证码
    public function sendCode() {
        //获取邮箱
        $email = request()->param('email');
        //判断是否已经发送
        if(Cache::get($email)) throw new BaseException(['code'=>200,'msg'=>'你操作太快，请稍后再试','errorCode'=>30001]);
        //生成验证码
        $code = random_int(1000,9999);
        //发送成功 写入缓存
        //if($res['Code']=='OK') return Cache::set($phone,$code,config('api.alisms.expire'));
        //模拟发送验证码
         Cache::set($email,$code,config('api.EMailCode.expire'));
         //send_mail($email,'欢迎注册UMWEB账号','你的邮箱验证码为：'.$code);
         throw new BaseException(['code'=>200,'msg'=>'验证码：'.$code,'errorCode'=>30005]);
        //发送失败
        throw new BaseException(['code'=>200,'msg'=>'发送失败','errorCode'=>30004]);
    }
}
