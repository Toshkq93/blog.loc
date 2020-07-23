<div class="single">
    <div class="container">
        <div class="col-md-8 single-main">
            <?php if (isset($post)): ?>
            <div class="post-info">

                <h4><a href="" style ="color: red"><?= $post['post_title'];?><a/><?= $post['created_at'];?></h4>
                Автор:<a href="#" rel="author"><?= $post['name'];?></a>
                <br>Город: <a href="#" rel="author"><?= $post['city'];?></a>
                <br>Email: <a href="#" rel="author"><?= $post['email'];?></a>
                <p><?= $post['text'];?></p>
            </div>
            <?php endif;?>
            <h3>Коментарии:</h3>
                <?php foreach ($comments as $comment): ?>
            <ul class="comment-list">
                    <h5 class="post-author_head"><a href="#" rel="author"><?= $comment['name'];?></a></h5>
                    <h5 class="post-author_head"><?= $comment['date_create'];?></h5>
                    <h5 class="post-author_head"><a href="#" rel="author"><?= $comment['content'];?></a></h5>
            </ul>
                <?php endforeach; ?>
            <br><br>
            <div class="content-form">
                <?php if (isset($_SESSION['user'])): ?>
                <h3>Оставить коментарит: </h3>
                <form action="/comment" method="post">
                    <textarea placeholder="Кометарии" name="content"></textarea>
                    <input type="hidden" name="post_id" value="<?= $post['id'];?>">
                    <input type="submit" value="Отправить"/>
                </form>
            </div>
            <?php else: ?>
                <h3 style="text-align: center">Войдите чтобы оставить коментарий</h3>
            <?php endif; ?>
        </div>
        <!--<div class="col-md-4 side-content">
            <div class="recent">
                <h3>RECENT POSTS</h3>
                <ul>
                    <li><a href="#">Aliquam tincidunt mauris</a></li>
                    <li><a href="#">Vestibulum auctor dapibus  lipsum</a></li>
                    <li><a href="#">Nunc dignissim risus consecu</a></li>
                    <li><a href="#">Cras ornare tristiqu</a></li>
                </ul>
            </div>
            <div class="comments">
                <h3>RECENT COMMENTS</h3>
                <ul>
                    <li><a href="#">Amada Doe </a> on <a href="#">Hello World!</a></li>
                    <li><a href="#">Peter Doe </a> on <a href="#"> Photography</a></li>
                    <li><a href="#">Steve Roberts  </a> on <a href="#">HTML5/CSS3</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <div class="archives">
                <h3>ARCHIVES</h3>
                <ul>
                    <li><a href="#">October 2013</a></li>
                    <li><a href="#">September 2013</a></li>
                    <li><a href="#">August 2013</a></li>
                    <li><a href="#">July 2013</a></li>
                </ul>
            </div>
            <div class="categories">
                <h3>CATEGORIES</h3>
                <ul>
                    <li><a href="#">Vivamus vestibulum nulla</a></li>
                    <li><a href="#">Integer vitae libero ac risus e</a></li>
                    <li><a href="#">Vestibulum commo</a></li>
                    <li><a href="#">Cras iaculis ultricies</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>-->
    </div>
</div>