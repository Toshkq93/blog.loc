<?php


namespace app\Controllers\admin;


use app\Models\Post;
use core\Controller;
use core\View;

class PostController extends Controller
{
    private $post;

    public function __construct()
    {
        $this->post = new Post();
    }

    public function delete($id)
    {
        if ($this->post->delete($id)) {
            $_SESSION['success'] = 'Пост успешно удален!';
            redirect();
        }
    }

    public function create($id)
    {
        View::render('admin/posts/create', ['post' => $this->post->getPostAdmin($id)]);
    }

    public function store()
    {
        $data = $_POST;
        if ($this->post->store($data, 'post')) {
            $_SESSION['success'] = 'Пост успешно изменен!';
            redirect(ADMIN . '/posts');
        }
    }

    public function change()
    {
        $data = removeHtml($_GET);
        if ($this->post->updatePost($data['id'], $data['status'])) {
            if ($data['status']) {
                $_SESSION['success'] = 'Пост успешно опубликован!';
            } else {
                $_SESSION['error'] = 'Пост отправлен на доработку!';
            }
            redirect();
        }

    }

    public function add()
    {
        View::render('admin/posts/add');
    }

    public function index()
    {
        $postsPub = $this->post->getAllPostsAdmin();
        $postNotPub = $this->post->getAllPostsNP();
        View::render('admin/posts/index', ['posts' => $postsPub, 'postsNP' => $postNotPub]);
    }
}