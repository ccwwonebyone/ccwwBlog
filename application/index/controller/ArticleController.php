<?php

namespace app\index\controller;

use think\Request;
use app\index\service\ArticleService;

class ArticleController extends Controller
{
    //验证规则
    protected $rules = [
        'title|标题' => 'require',
        // 'categroy_id|分类' => 'require',
        'content|内容' => 'require',
    ];

    /**
     * 显示资源列表
     *
     * @param  Request  $request
     * @return \think\response\Json
     * @throws \think\exception\DbException
     */
    public function index(Request $request)
    {
        return $this->asJson(
            ArticleService::getSingletonInstance()->show([], $request->param('limit', 10))
        );
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
     * @return \think\response\Json
     */
    public function save(Request $request)
    {
        $data = $request->all();
        $validate = $this->validate($data, $this->rules);
        if ($validate !== true) {
            return $this->asJson($validate, '参数错误', 5001);
        }
        if (ArticleService::getSingletonInstance()->store($data)) {
            return $this->asJson();
        } else {
            return $this->asJson([], '操作失败', 5002);
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     * @throws \think\Exception
     * @throws \think\exception\DbException
     */
    public function read($id)
    {
        return $this->asJson(ArticleService::getSingletonInstance()->read($id));
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
            return $this->asJson($validate, '参数错误', 5001);
        }
        if (ArticleService::getSingletonInstance()->update($data, $id)) {
            return $this->asJson();
        } else {
            return $this->asJson([], '操作失败', 5002);
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        return $this->asJson(ArticleService::getSingletonInstance()->delete($id));
    }
}
