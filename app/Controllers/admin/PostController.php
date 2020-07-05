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

    public function delete($id){
        if ($this->post->delete($id)){
            $_SESSION['success'] = 'Пост успешно удален!';
            redirect();
        }
    }

    public function create($id){
        $post = $this->post->getPost($id);
        View::render('admin/posts/create', compact('post'));
    }

    public function storePost(){
        if (isset($_POST['cansel'])){
            redirect(ADMIN . '/posts');
        }
        $data = $_POST;
        if ($this->post->store($data, 'post')){
            $_SESSION['success'] = 'Пост успешно изменен!';
            redirect(ADMIN . '/posts');
        }
    }

    public function change(){
        $data = $_GET;
        if ($this->post->updatePost($data['id'], $data['status'])){
            if ($data['status']) {
                $_SESSION['success'] = 'Пост успешно опубликован!';
            }else{
                $_SESSION['error'] = 'Пост отправлен на доработку!';
            }
            redirect();
        }

    }

    public function add(){
        View::render('admin/posts/add');
    }

    public function index(){
        $posts = $this->post->getAllPosts();
        View::render('admin/posts/index', compact('posts'));
    }
}