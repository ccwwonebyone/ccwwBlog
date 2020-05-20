<?php

namespace app\index\controller;

use think\Request;
use app\index\service\TagService;

class TagController extends Controller
{
    //验证规则
    protected $rules = [
        'name|标题' => 'require',
    ];

    /**
     * 显示资源列表
     *
     * @param  Request  $request
     * @return \think\Response
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index(Request $request)
    {
        $type = $request->param('type', '');
        return $this->asJson(TagService::getSingletonInstance()->show($type));
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
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function save(Request $request)
    {
        $data = $request->all();
        $validate = $this->validate($data, $this->rules);
        if ($validate !== true) {
            return $this->asJson($validate, '非法请求', 422);
        }
        if ($id = TagService::getSingletonInstance()->store($data)) {
            return $this->asJson($id);
        } else {
            return $this->asJson([], '新增失败', 422);
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
        $data = $request->all();
        $validate = $this->validate($data, $this->rules);
        if ($validate !== true) {
            return $this->asJson($validate, '非法请求', 422);
        }
        if (TagService::getSingletonInstance()->update($data, $id)) {
            return $this->asJson();
        } else {
            return $this->asJson([], '修改失败', 422);
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function delete($id)
    {
        if (TagService::getSingletonInstance()->delete($id)) {
            return $this->asJson();
        } else {
            return $this->asJson([], '无法删除，该标签已被使用', 422);
        }
    }
}
