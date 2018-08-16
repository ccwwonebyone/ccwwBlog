<?php

namespace app\index\controller;

use think\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->file('file');
        if(!is_dir('./upload')) mkdir('./upload');
        $info = $file->move('upload/','');
        return $info ? $this->asJson('public/upload/'.$info->getSaveName()) : $this->asJson('','上传文件失败',422);
    }
}
