<?php
namespace app\index\service;

use app\index\model\Company;

class CompanyService{

    public function update($data, $id)
    {
        return Company::where('id', $id)->update($data);
    }

    public function store($data)
    {
        $company = Company::create($data);
        return $company->id;
    }

    public function read($id)
    {
        return Company::find();
    }
}