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
        if($data['filename']){
            $data['js_path']  = 'component/'.$data['filename'].'/js/index.js';
            $data['css_path'] = 'component/'.$data['filename'].'/css/index.css';
            $data['plugins']  = implode(',',json_decode('component/'.$data['filename'].'/plugins/index.json',true));
            $data['content']  = 'component/'.$data['filename'].'/content/index.html';
        }
        unset($data['filename']);
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

}