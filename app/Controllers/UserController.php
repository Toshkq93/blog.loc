<?php


namespace app\Controllers;


use app\Models\User;
use core\View;
use app\helper\AuthHelper;
use mysql_xdevapi\Exception;
use RedBeanPHP\R;

class UserController extends AppController
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    //проверка
    //метод преобразования
    public function signup(){
        View::render('signup');
    }

    public function register(){
            $data = $_POST;
            removeHtml($data);
            if (!AuthHelper::validate($data, $this->user->rules)) {
                AuthHelper::getErrors();
                redirect();
            } else {
                $_SESSION['form_data'] = $data;
                $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $user = $this->user->checkUnique($data['login'], $data['email']);
                if (!AuthHelper::checkLoginEmail($data['login'], $data['email'], $user)) {
                    AuthHelper::getErrors();
                    redirect();
                } else {
                    $this->user->store($data, 'user');
                    $_SESSION['success'] = 'Вы успешно зарегестрировались!';
                    redirect(PATH);
                }
            }
        }

    public function logout(){
        unset($_SESSION['user']);
        redirect();
    }

    public function login(){
        if (!empty($_POST['login']) and $_POST['password']){
            $data['login'] = $_POST['login'];
            $data['password'] = $_POST['password'];
            $user = $this->user->getUser($data['login']);
            if(!empty($user)){
                if(AuthHelper::passwordValidate($data['password'], $user['password'])){
                    $_SESSION['success'] = 'Вы успешно авторизованы';
                    unset($user['password']);
                    $_SESSION['user'] = $user;
                    if ($user['is_admin']){
                        redirect(ADMIN);
                    }
                    redirect(PATH);
                }else{
                    $_SESSION['error'] = 'Логин/пароль введены не верно';
                    redirect();
                }
        }else{
                $_SESSION['error'] = 'Логин/пароль введены не верно';
            }
        }
        View::render('login');
    }
}