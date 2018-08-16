<?php

namespace app\index\controller;

use think\Request;
use app\index\Service\PageService;

class PageController extends Controller
{
    protected $pageService;

    //验证规则
    protected $rules = [
        'name|页面名' =>'require',
        'component_ids|插件组件' =>'require',
    ];

    public function _initialize()
    {
        $this->pageService = new PageService();
    }

    public function page(Request $request, $name)
    {
        return $this->fetch($name,['title'=>'']);
    }
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $request)
    {
        exit('index');
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
        $data     = $request->all();
        $validate = $this->validate($data,$this->rules);
        if($validate !== true) return $this->asJson($validate,'非法请求',422);
        if($this->pageService->save($data))
        {
            return $this->asJson();
        }else{
            return $this->asJson([],'新增失败',422);
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
        echo 'read';
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
}
