<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\lib\exception\BaseException;
use app\common\validate\CeshiValidate;
use app\common\controller\BaseController;

class Index extends BaseController
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
      (new CeshiValidate())->goCheck();
      $list = [
          ['id'=>10,'title'=>'123'],
          ['id'=>11,'title'=>'456'],
      ];
      return self::showResCode('获取成功',['list'=>$list]);
    }
}
