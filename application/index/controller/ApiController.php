<?php
namespace app\index\controller;

use think\Request;
use app\index\service\RequestClientService;
use app\index\service\ApiService;
use app\index\model\Api;

class ApiController extends BaseController
{
    protected $method = [
        'get'   =>'get',
        'put'   =>'put',
        'delete'=>'delete',
        'patch' =>'patch',
        'post'  =>'post',
    ];
    //验证规则
    protected $rules = [
        'url' =>'require|url',
        'method|请求方法' =>'alpha',
        'params|参数' =>'array',
        'headers|请求头' =>'array',
        'project_id|项目ID' =>'number',
    ];

    public function _initialize()
    {
        $this->apiService = new ApiService();
    }

    public function sendRequest(Request $request)
    {
        $data     = $request->all();
        $validate = $this->validate($data,$this->rules);
        if(!$validate) return $this->asJson($validate,'非法请求',422);

        $headers = $data['headers'] ?? [];
        $params  = $data['params'] ?? [];
        if(!$this->method[$data['method']]) return $this->asJson([],'非法请求',422);
        $requestClientService  = new RequestClientService($data['url'],$headers);
        $res  = call_user_func_array([$requestClientService,$this->method[$data['method']]],[$params]);
        $json = json_decode($res,true);
        return $json ? json($json) : $res;
    }

    public function index(Request $request)
    {
        extract($request->all());
        $search = [];
        $limit = isset($limit) ? $limit : 10;
        $search['url'] = isset($url) ? $url : '';
        return $this->asJson($this->apiService->apiList($search,$limit));
    }

    public function save(Request $request)
    {
        $data     = $request->all();
        $validate = $this->validate($data,$this->rules);
        if(!$validate) return $this->asJson($validate,'非法请求',422);
        $this->apiService->save($data);
        return $this->asJson();
    }

    public function update(Request $request,$id)
    {
        $data     = $request->all();
        $validate = $this->validate($data,$this->rules);
        if(!$validate) return $this->asJson($validate,'非法请求',422);
        $this->apiService->update($id,$data);
        return $this->asJson();
    }

    public function delete($id)
    {
        $this->apiService->delete($id);
        return $this->asJson();
    }

    public function read($id)
    {
        $result = $this->apiService->read($id);
        if($result){
            return $this->asJson($result);
        }else{
            return $this->asJson([],'查询失败',422);
        }

    }
}