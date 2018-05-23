<?php

namespace app\index\controller;

use think\Request;
use app\index\service\DataBaseService;

class DataBaseController extends BaseController
{
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
        $conn = $request->post();
        $dataBaseService = new DataBaseService($conn);
        $res = $dataBaseService->initDb();
        if($res){
            $this->asJson();
        }else{
            $this->asJson([],'出问题了','501');
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
        $data = $request->put();
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        $dataBaseService = new DataBaseService();
        $res = $dataBaseService->delDB($id);
        if($res){
            $this->asJson();
        }else{
            $this->asJson([],'出问题了','501');
        }
    }
    /**
     * 更新整个数据库，只能新增或删除
     *
     * @param int $id 数据库ID
     * @return void
     */
    public function updateDB(Request $request,$id)
    {
        $dataBaseService = new DataBaseService();
        $res = $dataBaseService->updateDb($id);
        if($res){
            $this->asJson();
        }else{
            $this->asJson([],'出问题了','501');
        }
    }
}
