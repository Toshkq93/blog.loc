<?php


namespace app\Controllers;

use app\Models\Post;
use core\Controller;
use core\View;

class MainController extends Controller
{
    private $posts;

    public function __construct()
    {
        $this->posts = new Post();
    }

    public function index()
    {
        $posts = $this->posts->getAllPostsMain();
        $canonical = PATH;
        View::render('main/index', ['posts' => $posts, 'canonical' => $canonical]);
    }

}