<?php require('session.php');
include_once ('../Models/User.php');
$role = User::getById($_SESSION['id']);
if (!$_SESSION): ?>
    <script>
        document.location.href = '403.html';
    </script>
<?php endif; ?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <title>Добавление поста</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="../js/valida.2.1.6.js"></script>
    <link href="../bootstrap/css/view.css" rel="stylesheet">
    <style>
        body {
            background: url(../images/01.gif)
        }
    </style>


</head>
<body>
<div class="container">
    <div class="row">
        <div class="well col-lg-12 back-img" ></br></br></br></br></div>

    </div>

    <div class="row">
        <div class="well col-lg-3 col-lg-offset-0 back-color ">

            <div class="btn-group-vertical btn-block">


                <a href="../Views/user_list.php" class="btn  btn-success">Список всех пользователей</a>
                <a href="posts_list.php?email=<?= $role->email ?>" class="btn  btn-success">Мои посты</a>


            </div>
        </div>
        <div class="well col-lg-9">

            <a href="/index.php" class="btn btn-success"><span class="glyphicon glyphicon-home"></span> На
                главную </a>
            <br/>
            <br/>
            <div class="form-group">
                <form action="../Controllers/create_post.php" class="valida" id="form" method="post" role="form">
                    <fieldset>
                        <input type="hidden" name="id" value="<?= trim($_REQUEST['id']) ?>">
                        <label for="name">Название поста:</label><br/>
                        <input type="text" name="name_post" id="name_post" placeholder="Введите название поста"
                               class="form-control"
                               required="true" maxlength="50"><br/>
                        <label for="email">Контент:</label><br/>
                <textarea type="text" name="content" id="content" placeholder="Ваш пост.." rows="5" class="form-control"
                          required="true" maxlength="500"></textarea><br/>
                        <button type="submit" name="submit" class="btn btn-block btn-success">Добавить пост<br/>
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
