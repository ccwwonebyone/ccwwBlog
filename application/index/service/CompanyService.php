<?php
namespace app\index\service;

use app\index\model\Comapny;

class CompanyService{

    public function update($data, $id)
    {
        return Comapny::where('id', $id)->update($data);
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