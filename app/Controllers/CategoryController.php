<?php


namespace app\Controllers;

use app\Models\Category;
use core\Controller;
use core\Pagination;
use core\View;
use RedBeanPHP\R;

class CategoryController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Category();
    }

    public function view($alias){

        $total = $this->model->getCountPosts();
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 2;
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $category = $this->model->getCategory($alias);
        if ($alias == 'all'){
            $posts = $this->model->getAllPosts($start, $perpage);
        }else {
            $posts = $this->model->getCatPosts($category->id, $start, $perpage);
        }
        View::render('category', compact('posts', 'pagination', 'total', 'perpage'));
    }


}