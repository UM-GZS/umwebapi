<?php

namespace app\common\validate;

use think\Validate;

class UserValidate extends BaseValidate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'email'=>'require|email',
		'code'=>'require|number|length:4|isPefectCode',
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'email.require'=>'请填写邮箱',
        'email.email'=>'请输入正确的邮箱'
    ];
    protected $scene = [
		//发送验证码
        'sendCode'=>['email'],
		//邮箱登录
		'emaillogin'=>['email','code'],
    ];
}
