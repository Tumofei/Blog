<?php require('session.php');

if (!$_SESSION): ?>
    <script>
        document.location.href = '403.html';
    </script>
<?php endif; ?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> Список пользователей:</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .weight {
            width: 95%;
            margin: 20px;
        }

        body {
            background: url(../images/1.jpg)
        }

    </style>
</head>
<body>
<?php
require('../Models/User.php');

$arr_users = User::getAll();
$user = User::getById($_SESSION['id']); ?>

<div class="container">
    <div class="row">
        <div class="well col-lg-12"><p class="text-center text-success h3">Blog.dev</p></div>

    </div>

    <div class="row">
        <div class="well col-lg-3 col-lg-offset-0  ">

            <div class="btn-group-vertical btn-block">

                <a href="../Views/user_list.php" class="btn  btn-success">Список всех пользователей</a>

                <a href="../Views/user_posts.php?email=<?= $user->email ?>" class="btn  btn-success">Мои посты</a>


            </div>
        </div>
        <div class="well col-lg-9">

            <a href="/index.php" class="btn btn-success"><span class="glyphicon glyphicon-home"></span> На главную
            </a>

            <?php if ($user->getRole()->level == 'admin') : ?>
                <a href="create_user_view.php" class="btn btn-success ">Добавление пользователя</a>
                <a href="../Views/role_list.php" class="btn  btn-success">Список ролей пользователей</a>

            <?php endif; ?>


            <table class="table table-striped table-bordered table-hover table-condensed weight">
                <h4 class="text-success" style="margin:20px"> Список пользователей: </h4>
                <tr>
                    <th>Имя</th>
                    <th>E-mail</th>
                    <th>Количество постов</th>
                    <th>Роль</th>
                    <th>Действия</th>
                </tr>

                <?php

                switch ($user->getRole()->level) {
                    case 'admin':
                        foreach ($arr_users as $users):?>
                            <tr>
                                <td>
                                    <a href="../Views/user_posts.php?email=<?= $users->email ?>"> <?= $users->name ?></a>
                                </td>
                                <td>  <?= $users->email ?> </td>
                                <td> <?= $users->getPostCount(); ?> </td>
                                <td>  <?= $users->getRole()->name ?> </td>
                                <td><a href="../Controllers/delete.php?who=user&id=<?= $users->id ?>"
                                       class="btn btn-block btn-success">
                                        Удалить </a></td>
                            </tr>
                        <?php endforeach;
                        break;
                    case 'moderator':
                        foreach ($arr_users as $users):?>
                            <tr>
                                <td>
                                    <a href="../Views/user_posts.php?email=<?= $users->email ?>"> <?= $users->name ?></a>
                                </td>
                                <td>  <?= $users->email ?> </td>
                                <td> <?= $users->getPostCount(); ?> </td>
                                <td>  <?= $users->getRole()->name ?> </td>
                                <td></td>
                            </tr>
                        <?php endforeach;
                        break;

                    case 'user':
                        foreach ($arr_users as $users):?>
                            <tr>
                                <td> <?= $users->name ?></a></td>
                                <td>  <?= $users->email ?> </td>
                                <td> <?= $users->getPostCount(); ?> </td>
                                <td>  <?= $users->getRole()->name ?> </td>
                                <td></td>
                            </tr>
                        <?php endforeach;

                        break;

                    default:
                        foreach ($arr_users as $users):?>
                            <tr>
                                <td> <?= $users->name ?></a></td>
                                <td>  <?= $users->email ?> </td>
                                <td> <?= $users->getPostCount(); ?> </td>
                                <td>  <?= $users->getRole()->name ?> </td>
                                <td></td>
                            </tr>
                        <?php endforeach;


                } ?>


            </table>
        </div>
    </div>
</div>
</body>
</html>