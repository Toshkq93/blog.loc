<?php


namespace app\Controllers;


use app\Models\Search;
use core\Controller;
use core\View;

class SearchController extends Controller
{
    private $search;

    public function __construct()
    {
        $this->search = new Search();
    }

    public function index(){
        $query = trim(htmlspecialchars(strip_tags($_GET['query'])));
        $result = $this->search->search($query);
        View::setMeta("Поиск по запросу {$query}");
        View::render('search', compact('query', 'result'));
    }

}