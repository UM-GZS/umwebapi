<?php
namespace app\common\validate;
use think\Validate;
use app\lib\exception\BaseException;
class BaseValidate extends Validate{
    public function goCheck($scene = false) {
        //获取请求过来的参数
      $param = request()->param();
      //开始验证
      $check = $scene?$this->scene($scene)->check($param):$this->check($param);
      if(!$check) {
        throw new BaseException(['msg'=>$this->getError(),'errorCode'=>10000,'code'=>400]);
      }
      return true;
    }
    //验证码验证
    protected function isPefectCode($value,$rult='',$data='',$field='') {
      $beforeCode = cache($data['email']);
      //验证码不存在
      if(!beforeCode) return "请重新获取验证码";
      //验证验证码
      if($value != $beforeCode) return "验证码错误";
      return true;
    }
}
?>
