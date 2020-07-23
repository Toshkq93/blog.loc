<?php


namespace app\Models;


use core\Model;
use RedBeanPHP\R;

class Message extends Model
{
    public $rules = ['required' => [['user_email'], ['user_name'], ['user_city'], ['message_content'],],
        'email' => [['user_email'],],];

    public function getCountMessagesNew()
    {
        return R::count('message', 'WHERE answed = 0');
    }

    public function getAllNewMessages()
    {
        return R::findAll('message', 'WHERE answed = 0');
    }

    public function getAllAnsMes()
    {
        return R::findAll('message', 'WHERE answed = 1');
    }

    public function getUserMes($id)
    {
        return R::getRow("SELECT * FROM message WHERE id = ?", [$id]);
    }

}