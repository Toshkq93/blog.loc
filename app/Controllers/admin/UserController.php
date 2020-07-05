<?php


namespace app\Controllers\admin;


use app\helper\AuthHelper;
use app\Models\User;
use core\View;

class UserController extends AppController
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index(){
        $users = $this->user->getAllUsers();
        View::render('admin/user/index', compact('users'));
    }

    public function delete($id){
        if ($this->user->delete($id)){
            $_SESSION['success'] = 'Пользователь успешно удален';
            redirect();
        }
    }

    public function create($id){
        $user = $this->user->find($id);
        View::render('admin/user/create', compact('user'));
    }

    public function save(){
        if (isset($_POST['cansel'])){
            redirect(ADMIN . '/users');
        }
        $data = $_POST;
        if($data['is_admin'] == 'Админ'){
            $data['is_admin'] = 1;
        }else{
            $data['is_admin'] = 0;
        }
        if (AuthHelper::validate($data, $this->user->rules)){
            $this->user->store($data, 'user');
            $_SESSION['success'] = 'Пользователь успешно изменен!';
            redirect(ADMIN . '/users');
        }
    }

}