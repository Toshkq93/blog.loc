<?php


namespace app\Controllers\admin;


use app\Helper\EmailHelper;
use app\Models\Message;
use core\Controller;
use core\View;

class MessageController extends Controller
{
    private $message;

    public function __construct()
    {
        $this->message = new Message();
    }

    public function index()
    {
        $newMes = $this->message->getAllNewMessages();
        $oldMes = $this->message->getAllAnsMes();
        View::render('admin/message/index', ['messages_new' => $newMes, 'messages_old' => $oldMes]);
    }

    public function answed()
    {
        $id = $_GET['id'];
        $user = $this->message->getUserMes($id);
        $_SESSION['user_message'] = $user;
        View::render('admin/message/message');
    }

    public function send()
    {
        $data = removeHtml($_POST);
        $_SESSION['message'] = implode($data);
        if (EmailHelper::SendMail()) {
            $_SESSION['user_message']['answed'] = 1;
            if ($this->message->update($_SESSION['user_message'], 'message', $_SESSION['user_message']['id'])) {
                unset($_SESSION['message']);
                unset($_SESSION['user_message']);
                $_SESSION['success'] = 'Ваше сообщение отправлено на почту пользователю';

                redirect(ADMIN . '/messages');
            }
        }
    }
}