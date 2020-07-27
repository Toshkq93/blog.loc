<div class="row">
    <div class="col-md-6 col-md-offset-3 well">
        <h3 class="text-center">Форма для смены пароля</h3>
        <form class="form" method="post" action="<?= PATH;?>/user/sendMess" data-toggle="validator">
            <div class="col-xs-12">
                <div class="form-group has-feedback">
                    <label for="login">Введите email адрес на который было зарегистрирован аккаунт:</label>
                    <input type="text" class="form-control" name="email" placeholder="Email" required />
                </div>
            </div>
            <div class="text-center col-xs-12">
                <input type="submit" class="btn btn-default" value="Отправить" />
            </div>
        </form>
    </div>