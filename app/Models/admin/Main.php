<?php


namespace app\Models\admin;


use core\Model;
use RedBeanPHP\R;

class Main extends Model
{
    public function getCountPosts(){
        return R::count('post');
    }

    public function getCountUsers(){
        return R::count('user');
    }

    public function getCountCategory(){
        return R::count('category');
    }
}