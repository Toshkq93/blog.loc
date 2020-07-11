<?php


namespace app\Models;


use core\Model;
use RedBeanPHP\R;

class Main extends Model
{
    public function getAllPosts(){
        return R::findAll("post", "ORDER BY created_at DESC LIMIT 2");
    }


    public function getCountUsers(){
        return R::count('user');
    }

    public function getCountCategory(){
        return R::count('category');
    }

}