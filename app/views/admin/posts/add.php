<?php

use app\Helper\MenuHelper;

?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <form action="<?= ADMIN;?>/post/store" method="post">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td>Название поста:</td>
                                    <td><input type="text" name="title" style="width: 220px" value=""></td>
                                </tr>
                                <tr>
                                    <td>Описание:</td>
                                    <td><input type="text" name="description" value=""></td>
                                </tr>
                                <tr>
                                    <td>Контент:</td>
                                    <td><textarea name="text" id="" cols="30" rows="10"></textarea>
                                </tr>
                                <tr>
                                    <td>Категория:</td>
                                    <td>
                                        <?php new MenuHelper([
                                            'tpl' => APP . '/views/menu/select.php',
                                            'container' => 'select',
                                            'cache' => 0,
                                            'cacheKey' => 'user_select',
                                            'class' => 'form-control',
                                            'attrs' => [
                                                'name' => 'category_id',
                                                'id' => 'category_id',
                                            ]
                                        ])?>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <input type="submit" class="btn btn-success" value="Сохранить">
                            <a href="<?= ADMIN;?>/posts" class="btn btn-danger">Отмена</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>