<div class="row">
    <div class="col-md-6 col-md-offset-3 well">
        <h3 class="text-center">Форма для смены пароля</h3>
        <form class="form" method="post" action="<?= PATH;?>/user/changePassword" data-toggle="validator">
            <div class="col-xs-12">
                <div class="form-group has-feedback">
                    <label for="password">Введите новый пароль:</label>
                    <input type="password" class="form-control" name="password" placeholder="password" required />
                </div>
                <div class="form-group has-feedback">
                    <label for="password">Повторите пароль:</label>
                    <input type="password" class="form-control" name="repeat_password" placeholder="password" required />
                </div>
            </div>
            <div class="text-center col-xs-12">
                <input type="submit" class="btn btn-default" value="Отправить" />
            </div>
        </form>
    </div>