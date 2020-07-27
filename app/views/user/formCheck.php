<div class="row">
    <div class="col-md-6 col-md-offset-3 well">
        <form class="form" method="post" action="<?= PATH;?>/user/checkcode" data-toggle="validator">
            <div class="col-xs-12">
                <div class="form-group has-feedback">
                    <label for="login">Введите код подтверждения:</label>
                    <input type="text" class="form-control" name="code" placeholder="Код для подтверждения" required />
                </div>
            </div>
            <div class="text-center col-xs-12">
                <input type="submit" class="btn btn-default" value="Отправить" />
            </div>
        </form>
    </div>