<?php

namespace app\index\controller;

use think\Request;
use app\index\service\CategoryService;
use think\Response;

class CategoryController extends Controller
{
    //验证规则
    protected $rules = [
        'name|标题' => 'require',
    ];

    /**
     * 显示资源列表
     *
     * @param  Request  $request
     * @return Response
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index(Request $request)
    {
        $type = $request->param('type', '');
        return $this->asJson(CategoryService::getSingletonInstance()->show($type));
    }

    /**
     * 显示创建资源表单页.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return Response
     */
    public function save(Request $request)
    {
        $data = $request->all();
        $validate = $this->validate($data, $this->rules);
        if ($validate !== true) {
            return $this->asJson($validate, '非法请求', 422);
        }

        if (CategoryService::getSingletonInstance()->store($data)) {
            return $this->asJson();
        } else {
            return $this->asJson([], '新增失败', 422);
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return Response
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
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validate = $this->validate($data, $this->rules);
        if ($validate !== true) {
            return $this->asJson($validate, '非法请求', 422);
        }
        if (CategoryService::getSingletonInstance()->update($data, $id)) {
            return $this->asJson();
        } else {
            return $this->asJson([], '修改失败', 422);
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return Response
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function delete($id)
    {
        if (CategoryService::getSingletonInstance()->delete($id)) {
            return $this->asJson();
        } else {
            return $this->asJson([], '无法删除，该分类已被使用', 422);
        }
    }
}
