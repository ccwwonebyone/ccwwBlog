<?php

namespace app\index\service;

use app\index\model\Media;
use Qiniu\Storage\UploadManager;
use Qiniu\Auth;

class QiniuService extends Service
{

    protected $token;

    /**
     * QiniuService constructor.
     * @param  null  $accessKey
     * @param  null  $secretKey
     * @param  null  $bucketName
     */
    public function __construct($accessKey = null, $secretKey = null, $bucketName = null)
    {
        $accessKey = $accessKey ?? config('qiniu.access_key');
        $secretKey = $secretKey ?? config('qiniu.secret_Key');
        $bucketName = $bucketName ?? config('qiniu.bucketname');
        $this->token = (new Auth($accessKey, $secretKey))->uploadToken($bucketName);
    }

    /**
     * @param $key
     * @param $file_path
     * @return array
     * @throws \Exception
     */
    public function uploadFile($key, $file_path)
    {
        $manager = new UploadManager();
        return $manager->putFile($this->token, $key, $file_path);
    }
} 