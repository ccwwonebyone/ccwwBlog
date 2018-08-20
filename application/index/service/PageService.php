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
        $data['data'] = $this->pageData($data['component_ids']);
        $page = Page::create($data);
        if($page){
            $this->createPage($page->id);
            return true;
        }else{
            return false;
        }
    }

    public function update($id,$data)
    {
        $data['data'] = $this->pageData($data['component_ids']);
        return Page::where('id',$id)->update($data);
    }

    public function delete($id)
    {
        return Page::where('id',$id)->delete();
    }

    public function read($id)
    {
        $info = Page::where('id',$id)->find()->toArray();
        $info['data'] = json_decode($info['data'],true);
        $info['component_name'] = Component::whereIn('id',$info['component_ids'])->column('name');
        return $info;
    }

    public function info($name)
    {
        return Page::where('name',$name)->find();
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
        //try{
            $pageInfo   = Page::where('id',$id)->find();
            $components = Component::whereIn('id',explode(',',$pageInfo['component_ids']))->select();
            //生成模板文件
            $content    = $this->conetent(array_column($components, 'html'));
            $head       = $this->head(array_column($components, 'plugins'));
            $view       = new View();
            $title      = '{$title}';
            $html = $view->fetch('index@template/index',compact('content', 'head', 'pageInfo', 'title'));
            file_put_contents(APP_PATH.'/index/view/page/'.$pageInfo['name'].'.html', $html);
            //生成js,css文件
            $this->js($pageInfo, array_column($components, 'js'));
            $this->css($pageInfo, array_column($components, 'css'));
            return true;
        //}catch(\Exception $e){
        //    throw new Exception($e->,5001);
        //}

    }
    /**
     * 生成head部分内容
     *
     * @param array $pageInfo 页面信息
     * @return array
     */
    public function head($plugins)
    {
        $cssStr  = '';
        $jsStr   = '';
        $installPlugins = [];
        foreach($plugins as $pluginPath){
            $pluginInfo = json_decode(file_get_contents(ROOT_PATH.$pluginPath),true);
            if(!$pluginInfo) continue;
            foreach($pluginInfo as $k=>$plugin){
                if(in_array($k,$installPlugins)) continue;
                if(isset($plugin['js'])) $jsStr  .= '<script src="/node_modules/'.$plugin['js'].'"></script>'."\r\n";
                if(isset($plugin['css'])) $cssStr .= '<link rel="stylesheet" href="/node_modules/'.$plugin['css'].'">'."\r\n";
                $installPlugins[] = $k;
            }
        }
        return compact('cssStr','jsStr');
    }

    public function conetent($htmls)
    {
        $content = '';
        foreach($htmls as $htmlPath)
        {
            $data = file_get_contents(ROOT_PATH . $htmlPath);
            $content .= $data."\r\n";
        }
        return $content;
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
        if(!is_dir(ROOT_PATH.'public/js')) mkdir(ROOT_PATH.'public/js');
        if(!is_dir(ROOT_PATH.'public/js/'.$pageInfo['name'])) mkdir(ROOT_PATH.'public/js/'.$pageInfo['name']);
        foreach($jsPaths as $jsPath){
            $content = file_get_contents(ROOT_PATH.$jsPath)."\r\n";
            file_put_contents(ROOT_PATH.'public/js/'.$pageInfo['name'].'/index.js',$content,FILE_APPEND);
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
        if(!is_dir(ROOT_PATH.'public/css')) mkdir(ROOT_PATH.'public/css');
        if(!is_dir(ROOT_PATH.'public/css/'.$pageInfo['name'])) mkdir(ROOT_PATH.'public/css/'.$pageInfo['name']);

        foreach($cssPaths as $cssPath){
            $content = file_get_contents(ROOT_PATH.$cssPath)."\r\n";
            file_put_contents(ROOT_PATH.'public/css/'.$pageInfo['name'].'/index.css',$content,FILE_APPEND);
        }
    }

    /**
     * 根据启用组件ID生成使用数据
     *
     * @param string|array $component_ids
     * @return string
     */
    public function pageData($component_ids)
    {
        if(!$component_ids) return '';
        $pageData = Component::whereIn('id',$component_ids)->column('data','name');
        foreach($pageData as &$info){
            $info = json_decode(file_get_contents(ROOT_PATH.$info),true);
        }
        return json_encode($pageData);
    }
}