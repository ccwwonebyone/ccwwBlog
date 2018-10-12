<?php

namespace app\index\controller;

use think\Request;
use app\index\service\MediaService;

class UploadController extends Controller
{
    protected $mediaService;
    //验证规则
    protected $rules = [
        'file|文件' =>'require',
    ];

    public function _initialize()
    {
        $this->mediaService = new MediaService();
    }

    public function upload(Request $request)
    {
        $file = $request->file('file');
        $res = $this->mediaService->store($file);
        return $res ? $this->asJson($res) : $this->asJson('','上传文件失败',422);
    }
}
