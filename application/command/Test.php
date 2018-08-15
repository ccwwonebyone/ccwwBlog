<?php
namespace app\command;

use think\console\Command;
use think\console\Input;
use think\console\Output;
use think\View;

class Test extends Command
{
    protected function configure()
    {
        $this->setName('test')->setDescription('Here is the remark ');
    }

    protected function execute(Input $input, Output $output)
    {
        // $file = ROOT_PATH.'component/ueditor1_4_3_3-utf8-php.zip';
        // $destination = ROOT_PATH.'component/test';
        // $zip = new \ZipArchive();
        // if($zip->open($file) !== true) exit($output->writeln("解压失败:"));
        // $zip->extractTo($destination);
        // $zip->close();
        $content = $this->viewTest();
        file_put_contents(APP_PATH.'/index/view/page/test.html',$content);
        $output->writeln('write success');
        
    }

    public function viewTest()
    {
        $content = 'test content';
        $head['jsStr']      = 'test js';
        $head['cssStr']     = 'test css';
        $pageInfo = ['name'=>'test'];
        $title   = '{$title}';
        $view    = new View();
        return $view->fetch('index@template/index',compact('content','head','pageInfo','title'));
    }
}