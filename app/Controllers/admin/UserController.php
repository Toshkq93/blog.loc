<?php


namespace app\Controllers\admin;


use app\helper\AuthHelper;
use app\Models\User;
use core\Controller;
use core\View;

class UserController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        $users = $this->user->getAllUsers();
        View::render('admin/user/index', ['users' => $users]);
    }

    public function delete($id)
    {
        if ($this->user->delete($id)) {
            $_SESSION['success'] = 'Пользователь успешно удален';
            redirect();
        }
    }

    public function create($id)
    {
        View::render('admin/user/create', ['user' => $this->user->find($id)]);
    }

    public function save()
    {
        $data = removeHtml($_POST);
        if ($data['is_admin'] == 'Админ') {
            $data['is_admin'] = 1;
        } else {
            $data['is_admin'] = 0;
        }

        if ($this->user->store($data, 'user')) {
            $_SESSION['success'] = 'Пользователь успешно изменен!';
            redirect(ADMIN . '/users');
        }
    }

}