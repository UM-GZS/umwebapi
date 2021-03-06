<?php

namespace app\common\model;

use think\Model;
use think\facade\Cache;
use app\lib\exception\BaseException;

class User extends Model
{
	//自动写入时间
	protected $autoWriteTimestamp = true;
	//绑定用户信息表
	public function userinfo(){
		return $this->hasOne('Userinfo');
	}
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
         s_mail($email,'欢迎注册UMWEB账号','你的邮箱验证码为：'.$code);
         throw new BaseException(['code'=>200,'msg'=>'验证码：'.$code,'errorCode'=>30005]);
        //发送失败
        throw new BaseException(['code'=>200,'msg'=>'发送失败','errorCode'=>30004]);
    }
	//验证用户是否存在
	public function isExist($arr=[]){
		if(!is_array($arr)) return false;
		if(array_key_exists('email',$arr)){
			$user = $this->where('email',$arr['email'])->find();
			return $user;
		}
		return false;
	}
	//邮箱登录
	public function emailLogin() {
		//获取参数
		$param = request()->param();
		//验证用户是否存在
		$user = $this->isExist(['email'=>$param['email']]);
		//用户不存在 注册账号
		if($user) {
			$user = self::create([
				'username'=>$param['email'],
				'email'=>$param['email'],
			]);
			//创建用户信息表
			$user->userinfo()->create(['user_id'=>$user->id]);
			return $this->CreateSaveToken($user->toArray());
		}
		//用户是否被禁用
		$this->checkStatus($user->toArray());
		//登录成功，返回token
		return $this->CreateSaveToken($user->toArray());
	}
	//生成保存token
	public function CreateSaveToken($arr=[]){
		$token = shal(md5(uniqid(md5(microtime(true)),true)));
		$arr['token'] = $token;
		//登录过期时间
		// $expire = array_key_exists('expires_in',$arr) ? $arr['expires_in'] : config('api.token_expire');
		//保存到缓存
		if(!Cache::set($token,$arr,\config('api.token_expire'))) throw new BaseException();
		//返回token
		return $token;
	}
	//用户是否被禁用
	public function checkStatus($arr){
		$status = $arr['status'];
		if($status ==0) throw new BaseException(['code'=>200,'msg'=>'该用户已被禁用','errorCode'=>20001]);
		return $arr;
	}
}
