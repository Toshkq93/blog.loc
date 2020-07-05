<?php


namespace core;


use core\Db;
use RedBeanPHP\R;

class Model
{
    public function __construct()
    {
        Db::instance();
    }

    public function store($data, $table){
        $tbl = R::dispense($table);
        foreach ($data as $name => $value){
            $tbl->$name = $value;
        }
        R::store($tbl);
        return true;
    }
}