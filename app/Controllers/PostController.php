<?php


namespace app\Controllers;


use app\Models\Comment;
use app\Models\Post;
use core\Controller;
use core\View;

class PostController extends Controller
{
    private $post;
    private $comment;

    public function __construct()
    {
        $this->post = new Post();
        $this->comment = new Comment();
    }


    public function post($id)
    {
        $post = $this->post->getPost($id);
        unset($post['password']);
        $comments = $this->comment->getComments($id);
        View::render('post/index', ['post' => $post, 'comments' => $comments]);
    }

    public function add()
    {
        View::render('post/addPost');
    }

    public function store()
    {
        $data = removeHtml($_POST);
        $data['author_id'] = $_SESSION['user']['id'];
        if ($this->post->store($data, 'post')){
            $_SESSION['success'] = 'Статья успешно добавлена';
            redirect(PATH . '/user/cabinet');
        }
    }

}