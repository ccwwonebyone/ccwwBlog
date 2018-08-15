<?php
namespace app\index\service;

use think\Exception;
use app\index\model\Page;
use app\index\model\Component;
use think\View;

class PageService{

    public function index($search,$limit = 10)
    {
        $where = [];
        $query = Page::where($where);
        $res = $limit ? $query->paginate($limit) : $query->get();
        $data = $limit ? $res['data'] : $res;
        $limit ? $res['data'] = $data : $res = $data;
        return $res;
    }

    public function save($data)
    {
        if($data['filename']){
            $data['js_path']  = 'component/'.$data['filename'].'/js/index.js';
            $data['css_path'] = 'component/'.$data['filename'].'/css/index.css';
            $data['plugins']  = 'component/'.$data['filename'].'/plugins/index.json';
            $data['content']  = 'component/'.$data['filename'].'/content/index.json';
        }
        unset($data['filename']);
        return Page::create($data);
    }

    public function update($id,$data)
    {
        return Page::where('id',$id)->update($data);
    }

    public function delete($id)
    {
        return Page::where('id',$id)->delete();
    }

    public function read($id)
    {
        return Page::where('id',$id)->find()->toArray();
    }

    /**
     * 根据页面ID创建页面的一整套流程
     *
     * @param int $id 页面ID
     * @throws Exception 
     * @return void
     */
    public function createPage($id)
    {
        try{
            $pageInfo   = Page::where('id',$id)->find();
            $components = Component::whereIn('id',$pageInfo['component'])->get();
            //生成模板文件
            $content    = '';
            foreach($components as $component){
                //拼接内容
                $content .= $component['content']."\r\n";
            }
            $head        = $this->head($pageInfo);
            $view        = new View();
            $title       = '{$title}';
            $html = $view->fetch('template/index',compact('content', 'head', 'pageInfo', 'title'));
            file_put_contents(APP_PATH.'index/view/page/'.$pageInfo['name'].'.html', $html);
            //生成js,css文件
            $this->js($pageInfo, array_column($components, 'js_path'));
            $this->css($pageInfo, array_column($components, 'css_path'));
            return true;
        }catch(\Exception $e){
            throw new Exception('权限不足',5001);
        }

    }
    /**
     * 生成head部分内容
     *
     * @param array $pageInfo 页面信息
     * @return array
     */
    public function head($pageInfo)
    {
        $plugins = explode(',',$pageInfo['plugins']);
        $cssStr  = '';
        $jsStr   = '';
        foreach($plugins as $plugin){
            $cssStr .= '<link rel="stylesheet" href="/node_modules/'.$plugin.'/dist/css/'.$plugin.'.min.css">'."\r\n";
            $jsStr  .= '<script src="/node_modules/'.$plugin.'/dist/js/'.$plugin.'.min.js"></script>'."\r\n";
        }
        return compact('cssStr','jsStr');
    }

    /**
     * 创建页面的js文件
     *
     * @param array $pageInfo 页面信息
     * @param array $jsPaths  所有组件的js路径
     * @return void
     */
    public function js($pageInfo, $jsPaths)
    {
        foreach($jsPaths as $jsPath){
            $content = file_get_contents($jsPath)."\r\n";
            file_put_contents('/js/'.$pageInfo['name'].'/index.js',$content,FILE_APPEND);
        }
    }
    /**
     * 创建页面的css文件
     *
     * @param array $pageInfo 页面信息
     * @param array $jsPaths  所有组件的css路径
     * @return void
     */
    public function css($pageInfo, $cssPaths)
    {
        foreach($cssPaths as $cssPath){
            $content = file_get_contents($cssPath)."\r\n";
            file_put_contents('/css/'.$pageInfo['name'].'/index.css',$content,FILE_APPEND);
        }
    }
}