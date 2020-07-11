<?php


namespace app\Controllers\admin;
use app\Models\Main;
use core\View;

class MainController extends AppController
{
    private $model;

    public function __construct()
    {
        $this->model = new Main();
    }

    public function main(){
        $users = $this->model->getCountUsers();
        $categories = $this->model->getCountCategory();
        $posts = $this->model->getCountPosts();
        View::render('admin/main/main', compact(
            'users',
            'posts',
            'categories'
        ));
    }

}