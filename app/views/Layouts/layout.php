<?php

use app\Helper\MenuHelper;
use core\View;

?>
<!DOCTYPE HTML>
<html>
<head>
    <?php if (!empty($canonical)): ?>
    <link rel="canonical" href="<?= $canonical;?>">
    <?php endif; ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="/css/style.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link rel="stylesheet" href="/megamenu-js-master/css/style.css">
    <link rel="stylesheet" href="/megamenu-js-master/css/ionicons.min.css">
    <link rel="stylesheet" href="/css/register.css">
    <!----//webfonts---->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!--end slider -->
    <!--script-->
    <script type="text/javascript" src="/js/move-top.js"></script>
    <script type="text/javascript" src="/js/easing.js"></script>
    <script src="/megamenu-js-master/js/megamenu.js"></script>
    <script src="/js/validator.js"></script>
    <script src="/js/my.js"></script>
    <!--/script-->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},900);
            });
        });
    </script>
</head>
<body>
<!---header---->
<div class="header">
    <div class="container">
        <div class="logo">
            <a href="<?= PATH;?>"><img src="/images/logo.png" title="" /></a>
        </div>
        <!---start-top-nav---->
        <div class="top-menu">
            <nav class="navbar navbar-light bg-light">
                <form class="form-inline search" method="get" action="/search">
                    <input type="text" autocomplete="off" name="query" placeholder="Поиск" class="form-control mr-sm-2" style="width: 140px;">
                     <button><img src="/images/search.png" alt=""></button>
                </form>
                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Аккаунт
                    </button>
                    <div class="dropdown-menu">
                        <?php if (!empty($_SESSION['user'])): ?>
                            <li><a href="<?= PATH;?>/user/kabinet">Добро пожаловать, <?= $_SESSION['user']['name'];?></a></li>
                        <?php if ($_SESSION['user']['is_admin']): ?>
                            <li><a href="<?= ADMIN;?>">Вход в админскую часть</a></li>
                        <?php endif; ?>
                            <li><a href="<?= PATH;?>/user/cabinet">Личный кабинет</a></li>
                            <li><a href="<?= PATH;?>/user/logout">Выход</a></li>
                        <?php else: ?>
                            <a class="dropdown-item" href="<?= PATH?>/user/login">Вход</a>
                            <a class="dropdown-item" href="<?= PATH?>/user/signup">Регистрация</a>
                            <a class="dropdown-item" href="/user/forgetpassword">Забыли пароль?</a>
                        <?php endif; ?>
                    </div>
        </div>
            </nav>
            <div class="menu-container">
                <div class="menu">
                    <?php new MenuHelper(); ?>
                </div>
            </div>
        <!---//End-top-nav---->
    </div>
</div>
    <div class="header"></div>
<!--/header-->
<div class="content">
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if(isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($_SESSION['success'])): ?>
                        <div class="alert alert-success">
                            <?php echo $_SESSION['success']; unset($_SESSION['success']);?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?= $content;?>
    </div>
</div>
<!---->
<div class="footer">
    <div class="container">
        <p>Copyrights © 2015 Blog All rights reserved | Template by <a href="http://w3layouts.com/">W3layouts</a></p>
    </div>
</div>