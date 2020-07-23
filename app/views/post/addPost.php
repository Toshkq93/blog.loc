<?php

use app\Helper\MenuHelper;

?>
<div class="row">
    <div class="col-md-6 col-md-offset-3 well">
        <h3 class="text-center">Добавление новой статьи</h3>
        <form class="form" method="post" action="<?= PATH;?>/post/store" data-toggle="validator">
            <div class="col-xs-12">
                <div class="form-group has-feedback">
                    <label for="name">Название статьи:</label>
                    <input type="text" class="form-control" name="title" placeholder="Имя" value="" required />
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group has-feedback">
                    <label for="login">Краткое описание:</label>
                    <input type="text" class="form-control" name="description" placeholder="Логин" value="" required />
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group has-feedback">
                    <label for="city">Содержимое статьи:</label>
                    <input type="text" class="form-control" name="text" placeholder="Город проживания" value="" required />
                </div>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-default" value="Сохранить" />
            </div>
        </form>
    </div>