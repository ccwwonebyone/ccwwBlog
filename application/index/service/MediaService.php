<?php
namespace app\index\service;

use app\index\model\Media;

class MediaService{
    /**
     * @param $data
     * @param $id
     * @return Media
     */
    public function update($data, $id)
    {
        return Media::where('id', $id)->update($data);
    }

    /**
     * @param $file
     * @return bool|string
     */
    public function store($file)
    {
        if(!is_dir('./upload')) mkdir('./upload');

        $file_info = $file->getInfo();
        if($info = $file->rule('md5')->move('upload/')){
                Media::create([
                    'name' => $file_info['name'],
                    'type' => $file_info['type'],
                    'size' => $file_info['size']/1024,
                    'url'  => request()->domain().'/upload/'.$info->getSaveName(),
                ]);
                return request()->domain().'/upload/'.$info->getSaveName();
        }else{
            return false;
        }
    }

    /**
     * @param $id
     * @return array
     * @throws \think\Exception
     * @throws \think\exception\DbException
     */
    public function read($id)
    {
        return Media::get($id)->toArray();
    }

    /**
     * @param  string  $type
     * @param  int  $limit
     * @return array
     * @throws \think\exception\DbException
     */
    public function show($type = '', $limit = 10)
    {
        $data   = Media::paginate($limit)->toArray();
        foreach ($data['data'] as &$info) {
            $info['size'] = $info['size'] > 1024 ? ($info['size'] / 1024).'m' : $info['size'].'kb';
        }
        return $data;
    }

    /**
     * @param $id
     * @return int
     */
    public function delete($id)
    {
        return Media::destroy($id);
    }

}