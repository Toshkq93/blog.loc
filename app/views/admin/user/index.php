
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Список зарегистрированных пользователей
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li class="active">Список зарегистрированных пользователей</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Имя</th>
                                <th>Логин</th>
                                <th>Город проживания</th>
                                <th>Email адресс</th>
                                <th>Админ/пользователь</th>
                                <th>Удалить</th>
                                <th>Редактировать</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($users)): ?>
                            <?php foreach($users as $user): ?>
                                <tr>
                                    <td><?=$user['id'];?></td>
                                    <td><?=$user['name'];?></td>
                                    <td><?=$user['login'];?></td>
                                    <td><?=$user['city'];?></td>
                                    <td><?=$user['email'];?></td>
                                    <td><?= $user['is_admin'] ? 'Админ':'Пользователь'; ?></td>
                                    <td><a href="<?= ADMIN;?>/user/delete/<?= $user['id'];?>"><i class="ion ion-close text-danger"></i></a></td>
                                    <td><a href="<?= ADMIN;?>/user/create/<?= $user['id'];?>"><i class="fa fa-fw fa-eye"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->