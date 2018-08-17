<?php

namespace app\index\controller;

use think\Request;
use app\index\service\ComponentService;

class ComponentController extends Controller
{
    protected $componentService;
    //验证规则
    protected $rules = [
        'name|插件名' =>'require',
        'filename|压缩包'=>'require',
        'type|插件类型' =>'require|number',
    ];

    public function _initialize()
    {
        $this->componentService = new ComponentService();
    }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        return $this->asJson($this->componentService->index());
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {

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
        if($this->componentService->save($data))
        {
            if($this->componentService->unzip(ROOT_PATH.$data['filename'],ROOT_PATH.'component')){
                $this->componentService->vueComponentJs($data);
            }
            return $this->asJson();
        }else{
            return $this->asJson([],'新增失败,该组件已存在',422);
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
        return $this->asJson($this->componentService->read($id));
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
        $data     = $request->all();
        $validate = $this->validate($data,$this->rules);
        if($validate !== true) return $this->asJson($validate,'非法请求',422);
        if($this->componentService->update($data))
        {
            return $this->asJson();
        }else{
            return $this->asJson([],'新增失败',422);
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
        return $this->asJson($this->componentService->delete($id));
    }
}
