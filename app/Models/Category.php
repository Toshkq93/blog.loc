<?php


namespace app\Models;


use core\Model;
use RedBeanPHP\R;

class Category extends Model
{
    public function getCategories()
    {
        return R::getAssoc('SELECT * FROM category');
    }

    public function getCategory($alias)
    {
        return R::findOne('category', "alias = ?", [$alias]);
    }

    public function getCatId($id)
    {
        return R::getRow('SELECT * FROM category WHERE id = ?', [$id]);
    }

    public function getCatPosts($catId, $start, $perpage)
    {
        return R::find('post', "WHERE category_id IN ($catId) ORDER BY created_at DESC LIMIT $start, $perpage");
    }

    public function deleteCategory($id)
    {
        return R::trash('category', $id);
    }

    public function getCountChild($id)
    {
        return R::count('category', 'parent_id = ?', [$id]);
    }

    public function getCountCategories()
    {
        return R::count('category');
    }
}