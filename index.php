<?php include('Views/session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <title>Блоги</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url(images/bg.jpg);
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="well col-lg-12" style="background-image: url(images/blog.jpg); "><p class="text-center text-success h3">Blog.dev</p></div>

    </div>

    <div class="row">
        <div class="well col-lg-3 col-lg-offset-0  ">

            <div class="btn-group-vertical btn-block">

                <!-- <a href="Views/create_user.html" class="btn btn-success ">Добавление пользователя</a>-->

                <?php
                if ($_SESSION) : ?>
                    <a href="Views/user_list.php" class="btn  btn-success">Список всех пользователей</a>
                    <a href="/Views/posts_list.php?email=<?= trim($_SESSION['email']); ?>" class="btn  btn-success">Мои
                        посты</a>

                    <?php
                else:
                    echo 'Залогинтесь, пожалуйста!';
                endif; ?>
            </div>
        </div>
        <!--<div class="well col-lg-9"> Основная часть</div>-->
    </div>
</div>
</body>
</html>