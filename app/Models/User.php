<?php


namespace app\Models;

use core\Model;
use RedBeanPHP\R;

class User extends Model
{

    public $rules = [
        'required' => [
            ['login'],
            ['password'],
            ['name'],
            ['email'],
            ['city'],
        ],
        'email' => [
            ['email'],
        ],
        'lengthMin' => [
            ['password', 6],
        ]
    ];

    public function getAllUsers(){
        return R::findAll('user');
    }

    public function delete($id){
        return R::trash('user', $id);
    }

    public function find($id){
        return R::getRow("SELECT * FROM user WHERE id = ?", [$id]);
    }

    public function getUser($login){
//        return R::findOne('user', "login = ?", [$login]);
        return R::getRow("SELECT * FROM user WHERE login = ?", [$login]);
    }

    public static function checkUnique($login, $email){
        return R::findOne('user', 'login = ? OR email = ?', [$login, $email]);
    }



}