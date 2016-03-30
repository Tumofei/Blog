<?php require('session.php');
require('../Models/User.php');
/**
 * Created by PhpStorm.
 * User: Timofei
 * Date: 28.03.2016
 * Time: 22:55
 */
if (!$_SESSION OR $_SESSION['role_id']!= 3): ?>
    <script>
        document.location.href = '403.html';
    </script>
<?php endif; ?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <title>Добавление роли</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="../js/valida.2.1.6.js"></script>
    <link href="../bootstrap/css/view.css" rel="stylesheet">
    <style>
        body {
            background: url(../images/1.jpg)
        }
    </style>


</head>
<body>
<div class="container">
    <div class="row">
        <div class="well col-lg-12"><p class="text-center text-success h3">Blog.dev</p></div>

    </div>

    <div class="row">
        <div class="well col-lg-3 col-lg-offset-0  ">

            <div class="btn-group-vertical btn-block">


                <a href="../Views/user_list.php" class="btn  btn-success">Список всех пользователей</a>
                <?php $role = User::getById($_SESSION['id']); ?>
                <a href="posts_list.php?email=<?= $role->email ?>" class="btn  btn-success">Мои посты</a>


            </div>
        </div>
        <div class="well col-lg-9">

            <a href="/index.php" class="btn btn-success"><span class="glyphicon glyphicon-home"></span> На
                главную </a>
            <br/>
            <br/>
            <div class="form-group">
                <form action="../Controllers/create_role.php" class="valida" id="form" method="post" role="form">
                    <fieldset>

                        <div class="form-group">
                        <label for="name_role">Название роли:</label><br/>
                        <input type="text" name="name_role" id="name_role" placeholder="Введите название роли"
                               class="form-control"
                               required="true"><br/>
                        </div>
                        <div class="form-group">
                        <label for="level">Уровень доступа:</label><br/>
                        <input type="text" name="level" id="level" placeholder="Введите уровень доступа"
                               class="form-control"
                               required="true"><br/>
                        </div>
                            <button type="submit" name="submit" class="btn btn-block btn-success">Добавить роль<br/>
                        </button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript" src="../js/jquery-2.2.2.min.js"></script>
<script type="text/javascript" src="../js/valida.2.1.6.js"></script>
<script type="text/javascript" src="../js/validation.js"></script>
</body>
</html>