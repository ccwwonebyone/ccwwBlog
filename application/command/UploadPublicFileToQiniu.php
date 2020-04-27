<?php
namespace app\command;

use think\console\Command;
use think\console\Input;
use think\console\Output;
use app\index\service\QiniuService;
use Manpro\Tools\File;

class UploadPublicFileToQiniu extends Command
{
    protected function configure()
    {
        $this->setName('upload:public')
            ->setDescription('上传public目录下文件至七牛云');
    }

    protected function execute(Input $input, Output $output)
    {
        $this->uploadDir('public/static');
        $this->uploadDir('public/img');
        $this->uploadDir('public/about');
    }

    public function uploadDir($upload_dir)
    {
        $qiniuService = new QiniuService();
        $file = new File();
        $file->traversal($upload_dir, function($dir, $file_name, $type) use ($qiniuService){
            $file_path = $dir.'/'.$file_name;
            if( $type == 2  && strripos($file_path, '.map') === false ){
                $qiniuService->uploadFile(str_replace('public/', '', $file_path), './'.$file_path);
            }
        });
    }
}
