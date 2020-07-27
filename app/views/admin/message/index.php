
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Список сообщений
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li> /
        <li class="active">Список сообщений</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <h3>Новые сообщения:</h3>
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Имя отправителя</th>
                                <th>Email отправителя</th>
                                <th>Город</th>
                                <th>Сообщение</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($messages_new as $message): ?>
                                <tr>
                                    <td><?=$message['id'];?></td>
                                    <td><?=$message['name'];?></td>
                                    <td><?=$message['email'];?></td>
                                    <td><?=$message['city'];?></td>
                                    <td><?=$message['message_content'];?></td>
                            <td><a href="<?= ADMIN;?>/answed?id=<?= $message['id'];?>" class="btn btn-default">Ответить</a></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h3>Отвеченные сообщения:</h3>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Имя отправителя</th>
            <th>Email отправителя</th>
            <th>Город</th>
            <th>Сообщение</th>
            <th>Посмотреть сообщение</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($messages_old as $messageOld): ?>
            <tr>
                <td><?=$messageOld['id'];?></td>
                <td><?=$messageOld['name'];?></td>
                <td><?=$messageOld['email'];?></td>
                <td><?=$messageOld['city'];?></td>
                <td><?=$messageOld['message_content'];?></td>
                <td><a href=""><i class="fa fa-fw fa-eye"></i></a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>

<!-- /.content -->