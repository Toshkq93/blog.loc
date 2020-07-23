<?php


namespace app\Models;


use core\Model;
use RedBeanPHP\R;

class Comment extends Model
{
    public function getComments($post_id){
        return R::getAssoc("SELECT comments.id, comments.content,comments.date_create, user.name, user.city FROM comments JOIN user ON comments.user_id = user.id WHERE comments.post_id = ?", [$post_id]);
    }

}