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
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="well col-lg-6 col-lg-offset-3">

            <!-- center page------------------->
            <table class="table table-striped table-bordered table-hover table-condensed weight">
                <h4 class="text-success" style="margin:20px"> Список пользователей: </h4>
                <tr>
                    <th>Имя</th>
                    <th>E-mail</th>
                    <th>Количество постов</th>
                    <th>Действия</th>
                </tr>
                <?php
                require('../Models/User.php');

                $arr_users = User::getAll();
                foreach ($arr_users as $users):?>
                    <tr>
                        <td><a href="../Views/user_posts.php?email=<?= $users->email ?>"> <?= $users->name ?></a></td>
                        <td>  <?= $users->email ?> </td>
                        <td> <?= $users->getPostCount(); ?> </td>
                        <td><a href="../Controllers/delete.php?who=user&id=<?=$users->id?>" class="btn btn-success"> Удалить </a></td>
                    </tr>
                <?php endforeach; ?>

            </table>
            <div class="weight">
                <a href="/index.html" class="btn btn-success"><span class="glyphicon glyphicon-home"></span> На главную
                </a>
            </div>
            <!-- center page------------------->
        </div>
    </div>
</div>
</body>


</html>