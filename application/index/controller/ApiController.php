<?php
namespace app\index\controller;

use think\Request;
use app\index\service\RequestClientService;
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
		'url'   	=>'require|url',
		'method|请求方法'	=>'alpha',
		'params|参数'	=>'array',
		'headers|请求头'	=>'array',
		'project_id|项目ID'=>'number',
	];

	public function sendRequest(Request $request)
	{
		$data = $this->input($request);
		$validate = $this->validate($data,$this->rules);
		if(!$validate) return $this->asJson($validate,'非法请求',422);

		$headers = $data['headers'] ?? [];
		$params  = $data['params'] ?? [];
		if(!$this->method[$data['method']]) return $this->asJson([],'非法请求',422);
		$requestClientService  = new RequestClientService($data['url'],$headers);
		$res = call_user_func_array([$requestClientService,$this->method[$data['method']]],[$params]);
		$json = json_decode($res,true);
		return $json ? json($json) : $res;
	}

	public function index(Request $request)
	{
		extract($this->input($request));
		$where = [];
		$url   = isset($url) ? $url : '';
		$limit = isset($limit) ? $limit : 10;
		if($url) $where['url'] = ['like','%'.$url.'%'];
		return $this->asJson(Api::where($where)->paginate($limit)->toArray());
	}

	public function save(Request $request)
	{
		$data     = $this->input($request);
		$validate = $this->validate($data,$this->rules);
		if(!$validate) return $this->asJson($validate,'非法请求',422);
		Api::insert($data);
		return $this->asJson();
	}

	public function update(Request $request,$id)
	{
		$data     = $this->input($request);
		$validate = $this->validate($data,$this->rules);
		if(!$validate) return $this->asJson($validate,'非法请求',422);
		Api::where('id',$id)->update($data);
		return $this->asJson();
	}

	public function delete($id)
	{
		Api::where('id',$id)->delete();
		return $this->asJson();
	}

	public function read($id)
	{
		$result = Api::where('id',$id)->find();
		if($result){
			return $this->asJson($result);
		}else{
			return $this->asJson([],'查询失败',422);
		}
		
	}
}