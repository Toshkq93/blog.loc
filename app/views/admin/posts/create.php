<!-- Content Header (Page header) -->

<section class="content-header">
    <h1>Редактирование поста № <?= $post['id'];?>
        <?php if (!$post['publication']):?>
            <a href="<?= ADMIN;?>/post/change&id=<?= $post['id'];?>&status=1" class="btn btn-success btn-xs">Опубликовать</a>
        <?php else: ?>
            <a href="" class="btn btn-default btn-xs">Опубликовано</a>
            <a href="<?= ADMIN;?>/post/change&id=<?= $post['id'];?>&status=0" class="btn btn-danger btn-xs delete">Вернуть на доработку</a>
        <?php endif; ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li class="active"><a href="<?= ADMIN ?>/posts">Список постов</a></li>
        <li class="active"></li>
    </ol>
</section>
<!-- Main content -->
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
                                    <td>ID поста:</td>
                                    <td><input type="text" name="id" id="" value="<?= $post['id']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Название поста:</td>
                                    <td><input type="text" name="title" style="width: 220px" value="<?= $post['title'];?>"></td>
                                </tr>
                                <tr>
                                    <td>Описание:</td>
                                    <td><input type="text" name="created_at" value="<?= $post['description'];?>"></td>
                                </tr>
                                <tr>
                                    <td>Дата создания:</td>
                                    <td><input type="text" name="created_at" value="<?= $post['created_at'];?>"></td>
                                </tr>
                                <tr>
                                    <td>Контент:</td>
                                    <td><textarea name="text" id="" cols="30" rows="10"><?= $post['text'];?></textarea>
                                </tr>
                                <tr>
                                    <td>Статус:</td>
                                    <td><?= $post['publication'] ? 'Опубликован' : 'Не опубликован';?></td>
                                </tr>
                                </tbody>
                            </table>
                            <input type="submit" class="btn btn-success" value="Сохранить">
                            <input type="submit" class="btn btn-danger" name="cansel" value="Отмена">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->