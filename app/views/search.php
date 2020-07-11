<?php

use core\View;

?>
<!--start-breadcrumbs-->

<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="<?= PATH;?>">Главная</a></li>
                <li>Поиск по запросу "<?=$query;?>"</li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--prdt-starts-->
<div class="prdt">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-9 prdt-left">
                <?php if(!empty($result)): ?>
                    <div class="product-one">
                        <?php foreach($result as $value): ?>
                            <div class="content-grid-info">
                                <div class="post-info">
                                    <h4><a href="post/<?= $value['id'];?>"><?= $value['title'];?></a><?= $value['created_at'];?></h4>
                                    <p><?=$value['description'] ;?></p>
                                    <a href="<?= PATH;?>/post/<?= $value['id'];?>"><span></span>READ MORE</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="clearfix"></div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!--product-end-->