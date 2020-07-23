<?php


namespace app\Controllers;

use app\Models\Category;
use app\Models\Post;
use core\Controller;
use core\Pagination;
use core\View;

class CategoryController extends Controller
{
    private $category;
    private $post;

    public function __construct()
    {
        $this->category = new Category();
        $this->post = new Post();
    }

    public function index($alias)
    {
        $total = $this->post->getCountPosts();
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 2;
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $category = $this->category->getCategory($alias);
        if ($alias == 'all') {
            $posts = $this->post->getAllPosts($start, $perpage);
        } else {
            $posts = $this->category->getCatPosts($category->id, $start, $perpage);

        }
        View::render('category/index',
            ['posts' => $posts, 'pagination' => $pagination, 'total' => $total, 'perpage' => $perpage]);
    }


}