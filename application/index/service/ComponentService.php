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

}