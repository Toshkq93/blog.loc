<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <form action="<?= ADMIN;?>/post/store" method="post">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td>Название поста:</td>
                                    <td><input type="text" name="title" style="width: 220px" value=""></td>
                                </tr>
                                <tr>
                                    <td>Описание:</td>
                                    <td><input type="text" name="description" value=""></td>
                                </tr>
                                <tr>
                                    <td>Контент:</td>
                                    <td><textarea name="text" id="" cols="30" rows="10"></textarea>
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