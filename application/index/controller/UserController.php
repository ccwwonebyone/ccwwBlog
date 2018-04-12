<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\User;
use think\Validate;

class UserController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        echo '1';
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $validate = new Validate([
            'username' => 'require',
            'password' => 'require',
            'email'    => 'require'
        ]);
        $userInfo = $request->post();
        if(!$validate->check($userInfo)){
            return ['message'=>'验证不通过','code'=>422];
        }
        $userdb = new User;
        // dump(['message'=>$userInfo,'code'=>200]);
        $res = $userdb->save(array_merge($userInfo,[
            'create_time'=>date('Y-m-d H:i:s')
        ]));
        if($res){
            return ['message'=>'注册成功','code'=>200];
        }else{
            return ['message'=>'注册失败','code'=>422];
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }

    /**
     * 登录用户
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function login(Request $request)
    {
        $validate = new Validate([
            'username'     => 'require',
            'password' => 'require'
        ]);
        $userInfo = $request->post();
        if(!$validate->check($userInfo)){

        }
        $userdb = new User;
        $res = $userdb->where($userInfo)->find();
        if($res){
            $userdb->where($userInfo)->update([
                'last_login_time'=>date('Y-m-d H:i:s')
            ]);
            echo '1';
        }else{
            echo '0';
        }
        
    }
}
