<?php

namespace app\index\controller;

use think\Controller;

class BaseController extends Controller
{
    /**
     * 返回Json数据
     *
     * @param array $data   数据信息
     * @param string $message   状态信息
     * @param integer $code 状态码
     * @return void
     */
    protected function asJson($data=[],$message='提交成功',$code=200)
    {
        return json([
            'message'=>$message,
            'code'=>$code,
            'data'=>$data
        ]);
    }
}
