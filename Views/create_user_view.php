<?php
include_once('../Models/Role.php');
include_once('../Models/User.php');
include_once('session.php');
if (!$_SESSION): ?>
    <script>
        document.location.href = '403.html';
    </script>
<?php endif; ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <title>Добавление пользователя</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bootstrap/css/view.css" rel="stylesheet">
    <script type="text/javascript" src="../js/valida.2.1.6.js"></script>
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
                <a href="../Views/user_posts.php?email=<?= $role->email ?>" class="btn  btn-success">Мои посты</a>


            </div>
        </div>
        <div class="well col-lg-9">
            <a href="/index.php" class="btn btn-group-vertical btn-success"><span
                    class="glyphicon glyphicon-home"></span> На
                главную </a><br/>
            <br/>
            <div class="form-group">
                <form action="" class="valida" id="form" method="post" role="form">
                    <fieldset>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" placeholder="Введите имя" class="form-control"
                                   filter="text" required="true">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name="email" id="email" placeholder="Введите email"
                                   class="form-control"
                                   required="true" filter="email" data-invalid="Must be a valid email address"
                                   size="30">
                            <div style="color: red" id="results"></div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" placeholder="Введите пароль"
                                   class="form-control"
                                   filter="text" required="true">
                        </div>

                        <div class="form-group">
                            <label for="password2">Repeate password:</label>
                            <input type="password" name="password" id="password2" placeholder="Повторите пароль"
                                   class="form-control"
                                   filter="text|matches:password" required="true" data-invalid="Passwords must match ">
                        </div>

                        <div class="form-group">
                            <label for="role_id">Permission:</label>
                            <select name="role_id" id="role_id" class="form-control">
                                <?php $arr_role = Role::getAll();
                                foreach ($arr_role as $role):?>
                                    <option value="<?= $role->id ?>"><?= $role->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <button type="submit" name="submit" id="submit" class="btn btn-block btn-success">Добавить
                            пользователя<br/></button>

                    </fieldset>

                </form>
            </div>


        </div>
    </div>
</div>

<!-- center page------------------->


<script type="text/javascript" src="../js/jquery-2.2.2.min.js"></script>
<script type="text/javascript" src="../js/valida.2.1.6.js"></script>
<script type="text/javascript" src="../js/validation.js"></script>
<script type="text/javascript" src="../js/create_user.js"></script>
</body>
</html>
