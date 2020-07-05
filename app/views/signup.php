<div class="row">
        <div class="col-md-6 col-md-offset-3 well">
            <h3 class="text-center">Регистрация</h3>
        <form class="form" method="post" action="/user/register" data-toggle="validator">
                <div class="col-xs-12">
                    <div class="form-group has-feedback">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Имя" value="<?= isset($_SESSION['form_data']['name']) ? $_SESSION['form_data']['name'] : '';?>" required />
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group has-feedback">
                        <label for="login">Login</label>
                        <input type="text" class="form-control" name="login" placeholder="Логин" value="<?= isset($_SESSION['form_data']['login']) ? $_SESSION['form_data']['login'] : '';?>" required />
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group has-feedback">
                        <label for="password">Password</label>
                        <input type="password" name="password" data-error="Пароль должен в себя включать не менее 6 символов" data-minlength="6" class="form-control" placeholder="Пароль" value="<?= isset($_SESSION['form_data']['password']) ? $_SESSION['form_data']['password'] : '';?>" required />
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group has-feedback">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city" placeholder="Город проживания" value="<?= isset($_SESSION['form_data']['city']) ? $_SESSION['form_data']['city'] : '';?>" required />
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group has-feedback">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Email" value="<?= isset($_SESSION['form_data']['email']) ? $_SESSION['form_data']['email'] : '';?>" required />
                    </div>
                </div>
                <div class="text-center col-xs-12">
                    <input type="submit" class="btn btn-default" value="Зарегистрироваться" />
                </div>
            </form>
        </div>