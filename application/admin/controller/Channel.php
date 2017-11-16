<?php
namespace app\admin\controller;


class Model extends Base
{
    public function index()
    {
        
        return $this->fetch();
    }
}
