<?php
namespace app\index\service;

use app\index\model\Company;

class CompanyService{
    /**
     * @param $data
     * @param $id
     * @return Company
     */
    public function update($data, $id)
    {
        return Company::where('id', $id)->update($data);
    }

    /**
     * @param $data
     * @return int
     */
    public function store($data)
    {
        $company = Company::create($data);
        return $company->id;
    }

    /**
     * @param $id
     * @return array
     * @throws \think\Exception
     * @throws \think\exception\DbException
     */
    public function read($id)
    {
        return Company::get($id)->toArray();
    }

    /**
     * @return array
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function info()
    {
        return Company::find()->toArray();
    }
}