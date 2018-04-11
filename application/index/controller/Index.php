<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller
{
	//vue编译后的页面的入口
    public function index()
    {
        return $this->fetch();
    }
}
