<?php
$parent = isset($category['childs']);

if (!$parent){
    $delete = '<a href="'.ADMIN.'/category/delete/' . $id .'" class="delete "><button class="btn btn-danger">Удалить</button></a>';
}else{
    $delete = '<button class="btn">Удалить</button>';
}
?>
<p class="item-p">
    <a class="list-group-item" href="<?= ADMIN;?>/category/edit/<?= $id;?>"><?= $category['title'];?></a><span><?= $delete;?></span>
</p>
<?php if ($parent): ?>
<div class="list-group">
    <?= $this->getMenuHtml($category['childs']);?>
</div>
<?php endif;?>
