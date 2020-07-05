<?php


namespace app\Controllers;


use app\Models\Main;
use core\View;

class MainController extends AppController
{
    private $main;

    public function __construct()
    {
        $this->main = new Main();
    }

    public function posts(){
        $posts = $this->main->getAllPosts();
        View::render('main', compact('posts'));
    }

}