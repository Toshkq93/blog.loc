
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Список постов
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li> /
        <li class="active">Список постов</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <h3>Статьи, которые опубликованы</h3>
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Имя поста</th>
                                <th>Дата создания</th>
                                <th>Удалить</th>
                                <th>Редактировать</th>
                                <th>Статус</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($posts as $post): ?>
                                <tr>
                                    <td><?=$post['id'];?></td>
                                    <td><?=$post['title'];?></td>
                                    <td><?=$post['created_at'];?></td>
                                    <td><a href="<?= ADMIN;?>/post/delete/<?= $post['id'];?>"><i class="ion ion-close text-danger"></i></a></td>
                                    <td><a href="<?= ADMIN;?>/post/create/<?= $post['id'];?>"><i class="fa fa-fw fa-eye"></i></a></td>
                                    <td><?= $post['publication'] ? 'Опубликовано' : 'Не опубликовано'; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="<?= ADMIN;?>/post/add" class="btn btn-primary" style="float: right">Добавить</a>
    <h3>Статьи, которые не опубликованы</h3>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Имя поста</th>
            <th>Дата создания</th>
            <th>Удалить</th>
            <th>Редактировать</th>
            <th>Статус</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($postsNP as $postnp): ?>
            <tr>
                <td><?=$postnp['id'];?></td>
                <td><?=$postnp['title'];?></td>
                <td><?=$postnp['created_at'];?></td>
                <td><a href="<?= ADMIN;?>/post/delete/<?= $postnp['id'];?>"><i class="ion ion-close text-danger"></i></a></td>
                <td><a href="<?= ADMIN;?>/post/create/<?= $postnp['id'];?>"><i class="fa fa-fw fa-eye"></i></a></td>
                <td><?= $postnp['publication'] ? 'Опубликовано' : 'Не опубликовано'; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>

<!-- /.content -->