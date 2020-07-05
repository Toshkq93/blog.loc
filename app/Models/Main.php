<?php


namespace app\Models;


use core\Model;

class Main extends Model
{
    public function getAllPosts(){
        return \R::findAll("post", 'ORDER BY created_at DESC');
    }

}