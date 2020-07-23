<?php


namespace app\Controllers\admin;

use app\Models\Category;
use app\Models\Message;
use app\Models\Post;
use app\Models\User;
use core\Controller;
use core\View;

class MainController extends Controller
{
    private $posts;
    private $user;
    private $category;
    private $message;

    public function __construct()
    {
        $this->posts = new Post();
        $this->user = new User();
        $this->category = new Category();
        $this->message = new Message();
    }

    public function main()
    {
        $users = $this->user->getCountUsers();
        $categories = $this->category->getCountCategories();
        $posts = $this->posts->getCountPosts();
        $messages = $this->message->getCountMessagesNew();
        View::render('admin/main/main', ['users' => $users, 'posts' => $posts, 'categories' => $categories, 'messages' => $messages]);
    }

}