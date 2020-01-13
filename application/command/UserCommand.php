<?php
namespace app\command;

use think\console\Command;
use think\console\Input;
use think\console\Output;
use think\View;
use app\index\service\UserService;
use app\index\model\User;

class UserCommand extends Command
{
    protected function configure()
    {
        $this->setName('init:user')->setDescription('初始化或重置用户信息')->addArgument('username', null, '用户名', '')->addArgument('password', null, '密码', '');;
    }

    protected function execute(Input $input, Output $output)
    {
        try {
            $arguments = $input->getArguments();
            if($arguments['username'] == '' || $arguments['password'] == ''){
                $output->writeln('请输入用户名密码,如下：');
                $output->writeln('php think init:user username password');
                return false;
            }
            $userService = new UserService();
            if($user = User::find()) User::where('id', $user->id)->delete();
            $userService->store([
                'username'=>$arguments['username'],
                'password'=>$arguments['password']
            ]);
            $output->writeln('用户信息已准备！可以开心的使用了！');
            $output->writeln('后台入口:http[s]://yourwebsite.com/vue');
        } catch (\Exception $e) {
            $output->writeln($e->getMessage());
        }
    }
}
