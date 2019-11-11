<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$this->getTitle()?></title>
    <link rel="stylesheet" href="/views/css/bootstrap.min.css">
    <link rel="stylesheet" href="/views/css/animation.css" type="text/css" />
    <link rel="stylesheet" href="/views/css/fontello.css" type="text/css" />
    <link rel="stylesheet" href="/views/css/fontello-codes.css" type="text/css" />
    <link rel="stylesheet" href="/views/css/fontello-embedded.css" type="text/css" />
    <link rel="stylesheet" href="/views/css/fontello-ie7.css" type="text/css" />
    <link rel="stylesheet" href="/views/css/fontello-ie7-codes.css" type="text/css" />
    <link rel="stylesheet" href="/views/css/style.css">
    <script src="/views/js/jquery.js"></script>
    <script src="/views/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li<?=$this->active[0] ?>><a href="http://<?=$_SERVER['HTTP_HOST'] ?>/">Список задач</a></li>
            <li<?=$this->active[1] ?>><a href="http://<?=$_SERVER['HTTP_HOST'] ?>/task/add">Добавить новую задачу</a></li>
            <li<?=$this->active[2] ?>>
            <?php
            if ($this->app->isAdmin)
            {
                ?> <a href="http://<?=$_SERVER['HTTP_HOST'] ?>/admin/logout">Выйти</a> <?php
            } else {
                ?> <a href="http://<?=$_SERVER['HTTP_HOST'] ?>/admin">Войти</a> <?php
            }
            ?>
            </li>
        </ul>
    </div>

</nav>
<div>

</div>