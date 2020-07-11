<?php


namespace app\Models;


use core\Model;
use RedBeanPHP\R;

class Category extends Model
{
    public function getCategories(){
        return R::getAssoc('SELECT * FROM category');
    }

    public function getAllPosts($start, $perpage){
        return R::findAll('post', "ORDER BY created_at DESC LIMIT $start, $perpage");
    }

    public function getCategory($alias){
        return R::findOne('category', "alias = ?", [$alias]);
    }

    public function getCatPosts($catId, $start, $perpage){
        return R::find('post', "WHERE category_id IN ($catId) ORDER BY created_at DESC LIMIT $start, $perpage");
    }

    public function getCountPosts(){
        return R::count('post');
    }
}