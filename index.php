<?php include('Views/session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <title>Блоги</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/view.css" rel="stylesheet">
    <style>
        body {
            background: url(images/01.gif);
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="well col-lg-12 back-img" ></br></br></br></br></div>

    </div>

    <div class="row">
        <div class="well col-lg-3 col-lg-offset-0 back-color">

            <div class="btn-group-vertical btn-block">


                <?php
                if ($_SESSION) : ?>
                    <a href="Views/user_list.php" class="btn  btn-success">Список всех пользователей</a>
                    <a href="/Views/posts_list.php?email=<?= trim($_SESSION['email']); ?>" class="btn  btn-success">Мои
                        посты</a>

                    <?php
                else: ?>
                    <p class="text-center"><?= 'Залогинтесь, пожалуста!' ?> </p>
               <? endif; ?>
            </div>
        </div>
        <!--<div class="well col-lg-9"> Основная часть</div>-->
    </div>
</div>
</body>
</html>