<?php

namespace app\index\service;

use think\Db;
use think\Exception;
use app\index\model\User;

class UserService extends Service
{
    /**
     * @param  array  $search
     * @param  int  $limit
     * @return array|bool|false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function userList($search = [], $limit = 10)
    {
        $where = [];
        if ($search['username']) {
            $where['username'] = ['like', '%'.$search['username'].'%'];
        }
        $query = User::where($where);
        return $limit ? $query->paginate($limit)->toArray() : $query->select();
    }

    /**
     * @param  array  $data
     * @return array|bool|float|int|mixed|object|\stdClass|null
     * @throws Exception
     */
    public function store($data = [])
    {
        if (User::where('username', $data['username'])->count() > 0) {
            return false;
        }
        if ($data['password']) {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        }
        $data['last_login_time'] = date('Y-m-d H:i:s');
        $user = User::create($data);
        return $user->id;
    }

    /**
     * @param $id
     * @param  array  $data
     * @return User
     */
    public function update($id, $data = [])
    {
        return User::where('id', $id)->update($data);
    }

    /**
     * @param $id
     * @return bool|int
     */
    public function delete($id)
    {
        return User::where('id', $id)->delete();
    }


    /**
     * 登陆
     * @param  array  $data
     * @return array|bool|false|\PDOStatement|string|\think\Model
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function login($data = [])
    {
        $info = User::where('username', $data['username'])->find();
        if ($info) {
            if (password_verify($data['password'], $info['password'])) {
                $this->update($info['id'], ['last_login_time' => date('Y-m-d H:i:s')]);
                session('user', json_encode($info));    //保存用户信息到session
                return $info;
            }
        }
        return false;
    }

    /**
     * 更新密码
     * @param $id
     * @param  array  $data
     * @return User|bool
     */
    public function updatePassword($id, $data = [])
    {
        $info = $this->read($id);
        if ($info) {
            if (password_verify($data['old_password'], $info['password'])) {
                return $this->update($id, ['password' => password_hash($data['password'], PASSWORD_BCRYPT)]);
            }
        }
        return false;
    }

    /**
     * @param $id
     * @return array
     * @throws Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function read($id)
    {
        return User::where('id', $id)->find()->toArray();
    }

    /**
     * @return bool
     */
    public function loginOut()
    {
        session(null);
        return true;
    }
}
