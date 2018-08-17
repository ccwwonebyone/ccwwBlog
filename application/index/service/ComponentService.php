<?php
namespace app\index\service;

use think\Exception;
use app\index\model\Component;

class ComponentService{

    public function index($search,$limit = 10)
    {
        $where = [];
        $query = Component::where($where);
        $res = $limit ? $query->paginate($limit) : $query->get();
        $data = $limit ? $res['data'] : $res;
        $limit ? $res['data'] = $data : $res = $data;
        return $res;
    }

    public function save($data)
    {
        $data['js']      = 'component/'.$data['name'].'/index.js';
        $data['css']     = 'component/'.$data['name'].'/index.css';
        $data['plugins'] = 'component/'.$data['name'].'/plugins.json';
        $data['html']    = 'component/'.$data['name'].'/index.html';
        unset($data['filename']);
        $info = Component::where('name',$data['name'])->find();
        if($info) return false;
        return Component::create($data);
    }

    public function update($id,$data)
    {
        return Component::where('id',$id)->update($data);
    }

    public function delete($id)
    {
        return Component::where('id',$id)->delete();
    }

    public function read($id)
    {
        return Component::where('id',$id)->find()->toArray();
    }
    /**
     * 解压文件
     *
     * @param string $file  解压文件
     * @param string $destination 解压目录
     * @return boolean
     */
    public function unzip($file,$destination)
    {
        $zip = new \ZipArchive();
        if($zip->open($file) !== true) return false;
        $zip->extractTo($destination);
        $zip->close();
        return true;
    }
    /**
     * 移动当前组件的vue文件，重置vue引入所有组件的js文件
     *
     * @param array $component 组件信息
     * @return boolean
     */
    public function vueComponentJs($component)
    {
        $vuePath = ROOT_PATH . 'front/src/components/' . ucwords($component['name']) . '.vue';
        if(copy(ROOT_PATH. 'component/'. $component['name'] . '/index.vue', $vuePath))
        {
            $components = Component::column('name');
            $head       = '';
            foreach($components as &$name)
            {
                $name = ucwords($name);
                $head = 'import '. $name . 'from ' .$name . "\r\n";
            }
            $componentStr = implode(',', $components);
            $content      = "{$head}export export default {\r\n";
            $content     .= $componentStr."\r\n";
            $content     .= "}\r\n\r\n";          
            file_put_contents(ROOT_PATH . 'front/src/components/index.js', $content);
            return true;
        }else{
            return false;
        }
    }
}