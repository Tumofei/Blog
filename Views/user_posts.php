<?php require('session.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> Посты пользователя </title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .weight {
            width: 95%;
            margin: 20px;
        }

    </style>
</head>
<body>


<?php
require('../Models/User.php');


$email = trim($_REQUEST['email']);


$user = User::getByEmail($email);
$posts_users = $user->getUserPosts();

?>
<div class="container">
    <div class="row">
        <div class="well col-lg-12"><p class="text-center text-success h3">Blog.dev</p></div>

    </div>

    <div class="row">
        <div class="well col-lg-3 col-lg-offset-0  ">

            <div class="btn-group-vertical btn-block">

                <a href="../Views/create_user.html" class="btn btn-success ">Добавление пользователя</a>
                <a href="../Views/user_list.php" class="btn  btn-success">Список всех пользователей</a>


            </div>
        </div>
        <div class="well col-lg-9">

            <a href="createsend_post.php?id=<?= $user->id ?>" class="btn  btn-success">Добавить пост</a>
            <a href="/index.php" class="btn btn-success"><span class="glyphicon glyphicon-home"></span> На главную
            </a>


            <table class="table table-striped table-bordered table-hover table-condensed weight">
                <h4 class="text-success" style="margin:20px"> Список постов <?= $user->name ?> : </h4>
                <tr>
                    <th>Название</th>
                    <th>Пост</th>
                    <th>Дата</th>
                    <th>Действие</th>
                </tr>
                <?php
                if (count($posts_users) == 0): ?>
                    <tr>
                        <td colspan="4"><?= 'This  user  has  no  posts' ?></td>

                    </tr>

                <?php endif;
                foreach ($posts_users as $posts): ?>
                    <tr>
                        <td><?= $posts->name_post ?></td>
                        <td> <?= $posts->content ?> </td>
                        <td> <?= $posts->date_create ?></td>
                        <td>
                            <a href="../Controllers/delete.php?who=post&id=<?= $posts->id ?>&id_users=<?= $posts->id_users ?>"
                               class="btn btn-block btn-success"> Удалить </a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</div>

<!-- center page------------------->


<!-- center page------------------->

</body>
</html>