<?php

namespace core;

class Db{

    use TSingletone;

    protected function __construct(){
        $db = require_once CONF . '/db.php';
        class_alias('\RedBeanPHP\R','\R');
        \R::setup($db['name'], $db['user'], $db['pass']);
        if (!\R::testConnection()){
            throw new \Exception("No connection with Data Base!", 500);
        }
    }

}