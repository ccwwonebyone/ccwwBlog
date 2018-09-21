<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: yunwuxin <448901948@qq.com>
// +----------------------------------------------------------------------
use Manpro\Manpro;

$manpro = new Manpro();
$manpro->traversal(APP_PATH.'command/',function($dir, $file, $type) use (&$commands){
    $commands[] = 'app\\command\\'.explode('.', $file)[0];
});

return $commands;
