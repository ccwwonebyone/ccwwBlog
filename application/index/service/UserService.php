<?php
namespace app\index\service;

use think\Db;
use think\Exception;
use app\index\model\User;

class UserService{

    public function userList($search = [],$limit = 10)
    {
        $where = [];
        if($search['username']) $where['username'] = ['like','%'.$search['username'].'%'];
        $query = User::where($where);
        return $limit ? $query->paginate($limit)->toArray() : $query->select();
    }

    public function save($data = [])
    {
        if(User::where('username',$data['username'])->count() > 0) return false;
        if($data['password']) $data['password'] = password_hash($data['password'],PASSWORD_BCRYPT);
        $data['create_time'] = $data['last_login_time'] = date('Y-m-d H:i:s');
        return User::insertGetId($data);
    }

    public function update($id,$data = [])
    {
        return User::where('id',$id)->update($data);
    }

    public function delete($id)
    {
        return User::where('id',$id)->delete();
    }
    //登陆
    public function login($data = [])
    {
        $info = User::where('username',$data['username'])->find();
        if($info){
            if(password_verify($data['password'],$info['password'])){
                $this->update($info['id'],['last_login_time'=>date('Y-m-d H:i:s')]);
                foreach ($info as $k => $v) {
                    session($k,$v);     //保存用户信息到session
                }
                return $info;
            }
        }
        return false;
    }
    //更新密码
    public function updatePassword($id,$data = [])
    {
        $info = $this->read($id);
        if($info){
            if(password_verify($data['old_password'],$info['password'])){
                return $this->update($id,['password'=>password_hash($data['password'],PASSWORD_BCRYPT)]);
            }
        }
        return false;
    }
    public function read($id)
    {
        return User::where('id',$id)->find()->toArray();
    }
}