<?php


namespace app\Controllers;


use app\Models\Post;
use core\View;

class PostController extends AppController
{
    private $post;

    public function __construct()
    {
        $this->post = new Post();
    }


    public function post($id){
        $post = $this->post->getPost($id);
        View::render('post', compact('post'));
    }

}