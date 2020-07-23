<?php


namespace app\Controllers\admin;


use app\Helper\CategoryHelper;
use app\Models\Category;
use app\Models\Post;
use core\Controller;
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

    public function index(){
        View::render('admin/category/index');
    }

    public function delete($id){
        $children = $this->category->getCountChild($id);
        $errors = '';
        if ($children){
            $errors .= '<li>Удаление невозможно, в категории есть вложенные категории</li>';
        }
        $posts = $this->post->checkPosts($id);
        if ($posts){
            $errors .= '<li>Удаление невозможно, в категории есть посты</li>';
        }
        if ($errors){
            $_SESSION['error'] = "<ul>$errors</ul>";
            redirect();
        }
        if ($this->category->deleteCategory($id)){
            $_SESSION['success'] = 'Категория успешно удалена';
            redirect();
        }

    }

    public function add(){
        View::render('admin/category/add');
    }

    public function save(){
        $data = removeHtml($_POST);
        $data['alias'] = CategoryHelper::createAlias($data['title']);
        if ($this->category->store($data, 'category')){
            $_SESSION['success'] = 'Категория успешно добавлена';
            redirect(ADMIN . '/category');
        }
    }

    public function edit($id){
        View::render('admin/category/edit', ['category' => $this->category->getCatId($id)]);
    }

    public function store(){
        $data = removeHtml($_POST);
        if ($this->category->store($data, 'category')){
            $_SESSION['success'] = 'Изменения успешно сохранены';
            redirect(ADMIN . '/category');
        }
    }


}