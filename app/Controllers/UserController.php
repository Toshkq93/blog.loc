<?php


namespace app\Controllers;


use app\Models\User;
use core\Controller;
use core\View;
use app\helper\AuthHelper;

class UserController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function signup()
    {
        View::render('user/signup');
    }

    public function register()
    {
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

    public function logout()
    {
        unset($_SESSION['user']);
        redirect();
    }

    public function login()
    {
        if (!empty($_POST['login']) and $_POST['password']) {
            $data['login'] = $_POST['login'];
            $data['password'] = $_POST['password'];
            $user = $this->user->getUser($data['login']);
            if (!empty($user)) {
                if (AuthHelper::passwordValidate($data['password'], $user['password'])) {
                    $_SESSION['success'] = 'Вы успешно авторизованы';
                    unset($user['password']);
                    $_SESSION['user'] = $user;
                    if ($user['is_admin']) {
                        redirect(ADMIN);
                    }
                    redirect(PATH);
                } else {
                    $_SESSION['error'] = 'Логин/пароль введены не верно';
                    redirect();
                }
            } else {
                $_SESSION['error'] = 'Логин/пароль введены не верно';
            }
        }
        View::render('user/login');
    }

    public function cabinet()
    {
        View::render('user/cabinet');
    }

    public function edit()
    {
        View::render('user/editUser');


    }

    public function store()
    {
        $data = removeHtml($_POST);
        $data['id'] = $_SESSION['user']['id'];
        $data['is_admin'] = $_SESSION['user']['is_admin'];
        $data['password'] = $this->user->find($_SESSION['user']['id'])['password'];
        if ($this->user->update($data, 'user', $data['id'])) {
            $_SESSION['success'] = 'Изменения успешно сохранены';
            unset($data['password']);
            $_SESSION['user'] = $data;
            redirect(PATH . '/user/cabinet');
        }
    }
}