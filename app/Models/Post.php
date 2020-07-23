<?php


namespace app\Models;


use core\Model;
use RedBeanPHP\R;

class Post extends Model
{
    public function getAllPostsMain()
    {
        return R::findAll("post", "WHERE publication = 1 ORDER BY created_at DESC LIMIT 2 ");
    }

    public function getPostAdmin($id)
    {
        return R::getRow("SELECT post.id, post.title as post_title, post.description, post.text, post.created_at, post.publication, user.name as user_name,category.title as category_title 
        FROM post JOIN user ON post.author_id = user.id 
        JOIN category on post.category_id = category.id
        WHERE post.id = ?", [$id]);
    }

    public function getPost($id)
    {
        return \R::getRow("SELECT post.id, post.title as post_title, post.description, post.text, post.created_at, user.name, user.email, user.city FROM post JOIN  user ON post.author_id = user.id WHERE post.id = ?", [$id]);
    }

    public function getAllPosts($start, $perpage)
    {
        return R::findAll('post', "ORDER BY created_at DESC LIMIT $start, $perpage");
    }

    public function getAllPostsAdmin()
    {
        return R::findAll('post', "WHERE publication = 1");
    }

    public function getAllPostsNP()
    {
        return R::findAll('post', "WHERE publication = 0");
    }

    public function delete($id)
    {
        return R::trash('post', $id);
    }

    public function updatePost($id, $status)
    {
        R::exec("UPDATE post SET publication='$status' WHERE id=?", [$id]);
        return true;
    }

    public function getCountPosts()
    {
        return R::count('post');
    }

    public function checkPosts($id)
    {
        return R::count('post', 'category_id = ?', [$id]);
    }

    public function search($query)
    {
        return R::getAll("SELECT * FROM post WHERE title LIKE ?", ["%{$query}%"]);
    }
}