<?php

namespace app\index\controller;

use think\Request;
use app\index\service\CompanyService;

class CompanyController extends Controller
{
    protected $companyService;
    //验证规则
    protected $rules = [
        'name|站点名' =>'require',
    ];

    public function _initialize()
    {
        $this->companyService = new CompanyService();
    }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
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
        if($validate !== true) return $this->asJson($validate,'参数错误',5001);
        if($this->companyService->save($data))
        {
            return $this->asJson();
        }else{
            return $this->asJson([],'操作失败',5002);
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
        return $this->asJson($this->companyService->read($id));
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
        if($validate !== true) return $this->asJson($validate,'参数错误',5001);
        if($this->companyService->update($data))
        {
            return $this->asJson();
        }else{
            return $this->asJson([],'操作失败',5002);
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
        //
    }
}
