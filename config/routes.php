<?php

use Buki\Router;
use core\ErrorHandler;
use core\View;

new ErrorHandler();
$router = new Router([
    'paths' => [
        'controllers' => '../app/Controllers',
    ],
    'namespaces' => [
        'controllers' => 'app\Controllers',
    ]
]);
$router->get('','MainController@index');

$router->get('category/:string', 'CategoryController@index');

$router->get('post/:id', 'PostController@post');
$router->get('post/add', 'PostController@add');
$router->post('post/store', 'PostController@store');

$router->get('user/login', 'UserController@login');
$router->post('user/login', 'UserController@login');
$router->get('user/signup', 'UserController@signup');
$router->post('user/register', 'UserController@register');
$router->get('user/logout', 'UserController@logout');
$router->get('user/cabinet', 'UserController@cabinet');
$router->get('user/edit', 'UserController@edit');
$router->post('user/store', 'UserController@store');

$router->get('search', 'SearchController@index');

$router->get('contacts', 'ContactController@index');
$router->post('contacts', 'ContactController@save');

$router->post('comment', 'CommentController@save');

$router->error(function (){
    include WWW . '/errors/404.php';
});

$router->group('admin', function ($r) {
    if (!empty($_SESSION['user']['is_admin']) && preg_match('#/admin/?.*#', $_SERVER['REQUEST_URI'])) {
            View::$layout = 'admin';

            $r->get('', 'admin\MainController@main');

            $r->get('posts', 'admin\PostController@index');
            $r->get('post/add', 'admin\PostController@add');
            $r->get('post/delete/:id', 'admin\PostController@delete');
            $r->get('post/create/:id', 'admin\PostController@create');
            $r->post('post/store', 'admin\PostController@store');
            $r->get('post/change', 'admin\PostController@change');
            $r->get('post/change', 'admin\PostController@change');

            $r->get('category', 'admin\CategoryController@index');
            $r->get('category/delete/:id', 'admin\CategoryController@delete');
            $r->get('category/add', 'admin\CategoryController@add');
            $r->post('category/save', 'admin\CategoryController@save');
            $r->get('category/edit/:id', 'admin\CategoryController@edit');
            $r->post('category/store', 'admin\CategoryController@store');

            $r->get('users', 'admin\UserController@index');
            $r->get('user/delete/:id', 'admin\UserController@delete');
            $r->get('user/create/:id', 'admin\UserController@create');
            $r->post('user/save', 'admin\UserController@save');

            $r->get('messages', 'admin\MessageController@index');
            $r->get('answed', 'admin\MessageController@answed');
            $r->post('send', 'admin\MessageController@send');
        }
});

$router->run();
