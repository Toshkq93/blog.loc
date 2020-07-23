<?php


namespace app\Controllers;


use app\Models\Comment;
use core\Controller;
use core\View;

class CommentController extends Controller
{
    private $comment;

    public function __construct()
    {
        $this->comment = new Comment();
    }

    public function save()
    {
        $data = $_POST;
        $data['user_id'] = $_SESSION['user']['id'];
        $this->comment->store($data, 'comments');
        redirect(PATH . "/post/{$data['post_id']}");
    }

}