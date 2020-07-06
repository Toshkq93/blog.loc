<?php


namespace app\Controllers;


use core\Controller;
use core\View;

class SearchController extends Controller
{

    public function index(){

        View::render('search');
    }

}