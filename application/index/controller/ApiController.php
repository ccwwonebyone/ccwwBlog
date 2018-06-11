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
        if($validate !== true) return $this->asJson($validate,'非法请求',422);


        $method    = strtolower($data['method']);
        $headers   = $this->parseParams($data['headers'],'header');
        $params    = $this->parseParams($data['params']);
        $urlParams = $this->parseParams($data['url_params'],'url');
        $url       = strpos($data['url'], '?') === false ? $data['url'].'?'.$urlParams : $data['url'].'&'.$urlParams;
        if(!isset($this->method[$method])) return $this->asJson([],'非法请求',422);
        $requestClientService  = new RequestClientService($url,$headers);
        $res  = call_user_func_array([$requestClientService,$method],[$params]);
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
        if($validate !== true) return $this->asJson($validate,'非法请求',422);
        $this->apiService->save($data);
        return $this->asJson();
    }

    public function update(Request $request,$id)
    {
        $data     = $request->all();
        $validate = $this->validate($data,$this->rules);
        if($validate !== true) return $this->asJson($validate,'非法请求',422);
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
    /**
     * 解析前端发过来的参数 type => body,header,url
     * @param array $params
     * @param string $type 解析类型
     * @return array or string
     */
    public function parseParams($params,$type = 'body')
    {
        $key   = 'key';
        $value = 'value';
        $info  = [];
        foreach($params as $param){
            if($type == 'body'){
                $info[$param[$key]] = $param[$value];
            }else if($type == 'header'){
                $info = $param[$key].':'.$param[$value];
            }else if($type == 'url'){
                $info[] = $param[$key].'='.$param[$value];
            }
        }
        return $type == 'url' ? implode('&',$info) : $info ;
    }
}