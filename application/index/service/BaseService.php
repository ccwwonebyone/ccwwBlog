<?php
namespace app\index\service;

class BaseService{

    protected $classes = [];

    public function loadClass($class)
    {
        if(!in_array($class, array_keys($this->classes))
        {
            $this->classes[$class] = new $class;    
        }
        return $this->classes[$class];
    }
}