<?php

namespace app\index\controller;

use app\index\service\MediaService;
use think\Request;

class UploadController extends Controller
{
    //验证规则
    protected $rules = [
        'file|文件' => 'require',
    ];

    public function upload(Request $request)
    {
        $file = $request->file('file');
        $res = MediaService::getSingletonInstance()->store($file);
        return $res ? $this->asJson($res) : $this->asJson('', '上传文件失败', 422);
    }
}
