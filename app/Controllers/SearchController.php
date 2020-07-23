<?php


namespace app\Controllers;


use app\Models\Post;
use core\Controller;
use core\View;

class SearchController extends Controller
{
    private $post;

    public function __construct()
    {
        $this->post = new Post();
    }

    public function index(){
        $query = removeHtmlStr($_GET['query']);
        $result = $this->post->search($query);
        View::render('search/index', ['query' => $query, 'result' => $result]);
    }

}