<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Ответ на обращение № </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li class="active"><a href="<?= ADMIN ?>/users">Список сообщений</a></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <form action="<?= ADMIN;?>/send" method="post">
                            <textarea placeholder="Сообщение" class="form-control" name="message_content"></textarea>
                            <input type="submit" value="Отправить" class="btn btn-success"/>
                            <a href="<?= ADMIN;?>/messages" class="btn btn-danger">Отмена</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->