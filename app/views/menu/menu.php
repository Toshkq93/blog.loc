<li>
    <?php if($category['alias'] == 'main'): ?>
    <a href="<?= PATH;?>"><?=$category['title'];?></a>
    <?php elseif($category['alias'] == 'contacts'): ?>
    <a href="<?= PATH;?>/contacts"><?=$category['title'];?></a>
    <?php else: ?>
    <a href="<?= PATH;?>/category/<?= $category['alias'];?>"><?=$category['title'];?></a>
    <?php if(isset($category['childs'])): ?>
        <ul>
            <?= $this->getMenuHtml($category['childs']);?>
        </ul>
    <?php endif; ?>
    <?php endif; ?>
</li>