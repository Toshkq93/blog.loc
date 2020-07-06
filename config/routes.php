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
$router->get('','MainController@posts');
$router->get('post/:id', 'PostController@post');
$router->get('user/login', 'UserController@login');
$router->post('user/login', 'UserController@login');
$router->get('user/signup', 'UserController@signup');
$router->post('user/register', 'UserController@register');
$router->get('user/logout', 'UserController@logout');
$router->get('search', 'SearchController@index');

$router->group('admin', function ($r) {
    if (!empty($_SESSION['user']['is_admin']) && preg_match('#/admin/?.*#', $_SERVER['REQUEST_URI'])) {
            View::$layout = 'admin';
            $r->get('category', 'admin\CategoryController@category');

            $r->get('', 'admin\MainController@main');

            $r->get('posts', 'admin\PostController@index');
            $r->get('post/add', 'admin\PostController@add');

            $r->get('post/delete/:id', 'admin\PostController@delete');
            $r->get('post/create/:id', 'admin\PostController@create');
            $r->post('post/store', 'admin\PostController@storePost');
            $r->get('post/change&id=:id&status=1', 'admin\PostController@change');
            $r->get('post/change&id=:id&status=0', 'admin\PostController@change');

            $r->get('users', 'admin\UserController@index');
            $r->get('user/delete/:id', 'admin\UserController@delete');
            $r->get('user/create/:id', 'admin\UserController@create');
            $r->post('user/save', 'admin\UserController@save');
        }
});

$router->run();