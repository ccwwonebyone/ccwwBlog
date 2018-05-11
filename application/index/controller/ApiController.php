<?php
namespace app\index\controller;

use think\Request;
use app\index\service\RequestClientService;
use app\index\model\Api;
class ApiController extends BaseController
{
	public function sendRequest(Request $request)
	{
		$requestClientService = new RequestClientService($request->post('url'));
		print_r($requestClientService->get()->rcExec());
		exit;
		// return $this->asJson($request->post());

	}

	public function index(Request $request)
	{
		extract($request->param());
		$where = [];
		if($url) $where['url'] = ['like','%'.$url.'%'];
		return $this->asJson(Api::where($where)->paginate($limit)->toArray());
	}

	public function save(Request $request)
	{
		$data     = $request->param();
		$validate = $this->validate($data,[
			'url'   	=>'url',
			'method|请求方法'	=>'alpha',
			'params|参数'	=>'array',
			'headers|请求头'	=>'array',
			'project_id|项目ID'=>'number',
		]);
		if(!$validate) return $this->asJson($validate,422);
		Api::save($data);
		return $this->asJson();
	}

	public function update(Request $request,$id)
	{
		$data     = $request->param();
		$validate = $this->validate($data,[
			'url'   	=>'url',
			'method|请求方法'	=>'alpha',
			'params|参数'	=>'array',
			'headers|请求头'	=>'array',
			'project_id|项目ID'=>'number',
		]);
		if(!$validate) return $this->asJson($validate,422);
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
		return $this->asJson(Api::where('id',$id)->find());
	}
}