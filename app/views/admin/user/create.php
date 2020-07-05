<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Редактирование пользователя № <?= $user['id'];?></h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li class="active"><a href="<?= ADMIN ?>/users">Список пользователей</a></li>
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
                    <form action="<?= ADMIN;?>/user/save" method="post">
                        <table class="table table-bordered table-hover">
                            <tbody>
                            <tr>
                                <td>ID пользователя:</td>
                                <td><input type="text" name="id" id="" value="<?= $user['id']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Имя пользователя:</td>
                            <td><input type="text" name="name" value="<?= $user['name'];?>"></td>
                            </tr>
                            <tr>
                                <td>Логин пользователя:</td>
                                <td><input type="text" name="login" value="<?= $user['login'];?>"></td>
                            </tr>
                            <tr>
                                <td>Город проживания:</td>
                                <td><input type="text" name="city" value="<?= $user['city'];?>"></td>
                            </tr>
                            <tr>
                                <td>Email адресс:</td>
                                <td><input type="text" name="email" value="<?= $user['email'];?>"></td>
                            </tr>
                            <tr>
                                <td>Роль:</td>
                                <td><input type="text" name="is_admin" value="<?= $user['is_admin'] ? 'Admin' : 'Пользователь';?>"></td>
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