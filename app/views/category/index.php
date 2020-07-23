<div class="content-grids">
    <div class="col-md-8 content-main">
        <div class="content-grid">
            <?php if (!empty($posts)): ?>
                <?php foreach ($posts as $post): ?>
                    <?php if ($post['publication']): ?>
                        <div class="content-grid-info">
                            <div class="post-info">
                                <h4><a href="<?= PATH;?>/post/<?= $post['id'];?>"><?= $post['title'];?></a><?= $post['created_at'];?></h4>
                                <p><?=$post['description'] ;?></p>
                                <a href="<?= PATH;?>/post/<?= $post['id'];?>"><span></span>READ MORE</a>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                <div class="clearfix"></div>
                <div class="text-center">
                    <p>Статей: <?= count($posts);?> из <?= $total;?></p>
                    <?php if ($pagination->countPages > 1): ?>
                        <?= $pagination;?>
                    <?php endif; ?>
                </div>
            <?php else: ?>
            <div class="text-center">
            <h3>В этой категории постов нет</h3>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>