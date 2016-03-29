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
    <title> Список привелегий </title>
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
require('../Models/Role.php');
include_once('../Models/User.php');

$arr_role = Role::getAll();
?>
<div class="container">
    <div class="row">
        <div class="well col-lg-12"><p class="text-center text-success h3">Blog.dev</p></div>

    </div>

    <div class="row">
        <div class="well col-lg-3 col-lg-offset-0  ">

            <div class="btn-group-vertical btn-block">


                <a href="../Views/user_list.php" class="btn  btn-success">Список всех пользователей</a>
                <?php $role = User::getById($_SESSION['id']); ?>
                <a href="../Views/user_posts.php?email=<?= $role->email ?>" class="btn  btn-success">Мои посты</a>


            </div>
        </div>
        <div class="well col-lg-9">

            <a href="/index.php" class="btn btn-success"><span class="glyphicon glyphicon-home"></span> На главную </a>
            <a href="../Views/create_role_view.php" class="btn  btn-success">Добавить роль</a>


            <table class="table table-striped table-bordered table-hover table-condensed weight" style="table-layout: fixed;
    width:95%">
                <h4 class="text-success" style="margin:20px"> Список ролей: </h4>

                <tr>
                    <th>Номер</th>
                    <th>Название</th>
                    <th>Уровень доступа</th>
                    <th>Действие</th>
                </tr>

                <?php
                foreach ($arr_role as $role): ?>
                    <tr>
                        <td><?= $role->id ?></td>
                        <td><?= $role->name ?></td>
                        <td><?= $role->level ?></td>
                        <td>
                            <?php if ($role->level == 'admin' OR $role->level == 'moderator' OR $role->level == 'user'): ?>
                                <p>Удаление невозможно</p>
                            <?php else: ?>
                                <a href="../Controllers/delete.php?who=role&id=<?= $role->id ?>"
                                   class="btn btn-block btn-success"> Удалить </a>
                            <?php endif ?>
                        </td>


                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</div>

</body>
</html>