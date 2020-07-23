<?php


namespace app\Controllers;


use app\helper\AuthHelper;
use app\Models\Message;
use core\Controller;
use core\View;

class ContactController extends Controller
{
    private $message;

    public function __construct()
    {
        $this->message = new Message();
    }

    public function index()
    {
        View::render('contact/index');
    }

    public function save()
    {
        $data = removeHtml($_POST);
        if (isset($_SESSION['user'])) {
            $data['user_email'] = $_SESSION['user']['email'];
            $data['user_name'] = $_SESSION['user']['name'];
            $data['user_city'] = $_SESSION['user']['city'];
        }
        if (!AuthHelper::validate($data, $this->message->rules)) {
            AuthHelper::getErrors();
            redirect();
        } else {
            $this->message->store($data, 'message');
            $_SESSION['success'] = 'Вы успешно отправили сообщение. В ближайшее время вам придет ответ на ваш email.';
            redirect();
        }

    }

}