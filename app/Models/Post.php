<?php


namespace app\Models;


use core\Model;
use RedBeanPHP\R;

class Post extends Model
{

    public function getPost($id){
        return \R::getRow("SELECT * FROM post WHERE id = ?", [$id]);
    }

    public function getAllPosts(){
        return R::findAll('post');
    }

    public function delete($id){
        return R::trash('post', $id);
    }

    public function updatePost($id, $status){
        R::exec("UPDATE post SET publication='$status' WHERE id=?", [$id]);
        return true;
    }

}