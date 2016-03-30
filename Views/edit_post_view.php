<?php require('session.php');
include_once('../Models/Post.php');
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
    <title>Редактирование поста</title>
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
<?php
$post = Post::getById(trim($_REQUEST['id_post'])); ?>
<div class="container">
    <div class="row">
        <div class="well col-lg-12"><p class="text-center text-success h3">Blog.dev</p></div>

    </div>

    <div class="row">
        <div class="well col-lg-3 col-lg-offset-0">

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
                <form action="../Controllers/edit_post.php" class="valida" id="form" method="post" role="form">
                    <fieldset>
                        <input type="hidden" name="id_users" value="<?= trim($_REQUEST['id_users']) ?>">
                        <input type="hidden" name="id_post" value="<?= trim($_REQUEST['id_post']) ?>">
                        <div class="form-group">
                            <label for="name">Название поста:</label><br/>
                            <input type="text" name="name_post" id="name_post" placeholder="Введите название поста"
                                   class="form-control"
                                   required="true" maxlength="50" value="<?= $post->name_post ?>"><br/>
                        </div>

                        <div class="form-group">
                            <label for="email">Контент:</label><br/>
                        <textarea type="text" name="content" id="content" placeholder="Ваш пост.." rows="5"
                                  class="form-control"
                                  required="true" maxlength="500"><?= $post->content ?></textarea><br/>

                        </div>
                        <button type="submit" name="submit" class="btn btn-block btn-success">Добавить изменения в
                            пост<br/>
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

