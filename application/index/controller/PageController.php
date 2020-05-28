<?php

namespace app\index\controller;

use think\Request;
use app\index\Service\PageService;

class PageController extends Controller
{
    protected $pageService;

    /**
     * 验证规则
     * @var string[]
     */
    protected $rules = [
        'name|页面名' => 'require',
        'component_ids|插件组件' => 'require',
    ];

    /**
     *
     */
    public function _initialize()
    {
        $this->pageService = new PageService();
    }

    /**
     * @param  Request  $request
     * @param $name
     * @return mixed|string
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function page(Request $request, $name)
    {

        $info = PageService::getSingletonInstance()->info($name);
        if (!$info) {
            return 'error';
        }
        $info = $info->toArray();
        $title = '测试';        //网站的标题
        return $this->fetch($name, ['title' => $title, 'data' => json_decode($info['data'], true)]);
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
     * @throws \think\Exception
     */
    public function save(Request $request)
    {
        $data = $request->all();
        $validate = $this->validate($data, $this->rules);
        if ($validate !== true) {
            return $this->asJson($validate, '非法请求', 422);
        }
        if (PageService::getSingletonInstance()->save($data)) {
            return $this->asJson();
        } else {
            return $this->asJson([], '新增失败', 422);
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function read($id)
    {
        return $this->asJson(PageService::getSingletonInstance()->read($id));
        /* zotikos:{
                  logo:{
                    name:"标题",
                    type:"img",
                    data:"/upload/3161545713.png"
                  },
                  url:{
                    name:"链接",
                    type:"text",
                    data:"主页"
                  }
              },
              test:{
                  text:{
                      name:"测试",
                      type:"text",
                      data:"完美"
                  } */
        // return $this->asJson([
        //     'zotikos'=>[
        //         'logo'=>[
        //             'name'=>'标题',
        //             'type'=>'img',
        //             'data'=>'/upload/3161545713.png'
        //         ],
        //         'url'=>[
        //             'name'=>"链接",
        //             'type'=>"text",
        //             'data'=>"主页"
        //         ]
        //     ],
        //     'test'=>[
        //         'text'=>[
        //             'name'=>"测试",
        //             'type'=>"text",
        //             'data'=>"完美"
        //         ]
        //     ]
        // ]);
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
