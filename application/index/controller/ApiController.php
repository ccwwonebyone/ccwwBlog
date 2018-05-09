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
		$this->save($request);
		print_r($requestClientService->get()->rcExec());
		exit;
		// return $this->asJson($request->post());

	}

	public function save(Request $request)
	{
		$data = $request->post();
		$api  = new Api();
		$api->save($data);
	}
}