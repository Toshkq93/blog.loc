<div class="row">
    <div class="col-md-6 col-md-offset-3 well">
        <h3 class="text-center">Изменение личных данных</h3>
        <form class="form" method="post" action="/user/store" data-toggle="validator">
            <div class="col-xs-12">
                <div class="form-group has-feedback">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Имя" value="<?= isset($_SESSION['user']['name']) ? $_SESSION['user']['name'] : '';?>" required />
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group has-feedback">
                    <label for="login">Login</label>
                    <input type="text" class="form-control" name="login" placeholder="Логин" value="<?= isset($_SESSION['user']['login']) ? $_SESSION['user']['login'] : '';?>" required />
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group has-feedback">
                    <label for="city">City</label>
                    <input type="text" class="form-control" name="city" placeholder="Город проживания" value="<?= isset($_SESSION['user']['city']) ? $_SESSION['user']['city'] : '';?>" required />
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group has-feedback">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Email" value="<?= isset($_SESSION['user']['email']) ? $_SESSION['user']['email'] : '';?>" required />
                </div>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-success" value="Сохранить" />
            </div>
        </form>
    </div>