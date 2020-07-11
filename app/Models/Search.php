<?php


namespace app\Models;


use core\Model;
use RedBeanPHP\R;

class Search extends Model
{

    public function search($query){
        return R::getAll("SELECT * FROM post WHERE title LIKE ?", ["%{$query}%"]);
    }

}