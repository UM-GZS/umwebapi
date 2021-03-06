<?php

namespace app\api\controller\v1;

use think\Controller;
use think\Request;
use app\common\controller\BaseController;
use app\common\validate\UserValidate;
use app\common\model\User as UserModel;

class User extends BaseController
{
    //发送验证码
  public function sendCode() {
      //验证参数
      (new UserValidate())->goCheck('sendCode');
      //发送验证码
      (new UserModel())->sendCode();
    return self::showResCodeWithOutData('发送成功');
  }
  public function emailLogin() {
	  //验证登陆信息
	  (new UserValidate())->goCheck('emaillogin');
	  //邮箱登陆
	  $token = (new UserModel())->emailLogin();
	  return self::showResCode('登录成功',['token'=>$token]);
  }
}
