<?php require('session.php');
$email = trim($_REQUEST['email']);
if (!$_SESSION ) : ?>
    <script>
        document.location.href = '403.html';
    </script>
<?php endif; ?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> Посты пользователя </title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bootstrap/css/view.css" rel="stylesheet">
    <style>
        .weight {
            width: 95%;
            margin: 20px;
        }

        body {
            background: url(../images/01.gif)
        }
    </style>
</head>
<body>


<?php
require('../Models/User.php');


$user = User::getByEmail($email);
$posts_users = $user->getUserPosts();
$role = User::getById($_SESSION['id']);
?>
<div class="container">
    <div class="row">
        <div class="well col-lg-12 back-img" ></br></br></br></br></div>

    </div>

    <div class="row">
        <div class="well col-lg-3 col-lg-offset-0 back-color  ">

            <div class="btn-group-vertical btn-block">


                <a href="../Views/user_list.php" class="btn  btn-success">Список всех пользователей</a>
                <a href="posts_list.php?email=<?= $role->email ?>" class="btn  btn-success">Мои посты</a>


            </div>
        </div>
        <div class="well col-lg-9">
            <?php switch ($role->getRole()->level) {
                case 'admin': ?>
                    <a href="create_post_view.php?id=<?= $user->id ?>" class="btn  btn-success">Добавить пост</a>
                    <?php break;

                case 'moderator':
                    if ($role->email == $email): ?>
                        <a href="create_post_view.php?id=<?= $user->id ?>" class="btn  btn-success">Добавить пост</a>
                    <?php endif;
                    break;

                case 'user': ?>
                    <a href="create_post_view.php?id=<?= $user->id ?>" class="btn  btn-success">Добавить пост</a>
                    <?php break;

                default: ?>
                    <a href="create_post_view.php?id=<?= $user->id ?>" class="btn  btn-success">Добавить пост</a>
                    <?php break;
            }
            ?>

            <a href="/index.php" class="btn btn-success"><span class="glyphicon glyphicon-home"></span> На главную
            </a>


            <table class="table table-striped table-bordered table-hover table-condensed weight" style="table-layout: fixed;
    width:95%">
                <h4 class="text-success" style="margin:20px"> Список постов <?= $user->name ?> : </h4>
                <col width="10%">
                <col width="45%">
                <col width="10%">
                <col width="15%">
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
                        <td style="word-break: break-all;"> <?= $posts->content ?> </td>
                        <td> <?= $posts->date_create ?></td>

                        <?php
                        if ($role->getRole()->level == 'moderator' AND $role->email != $email) : ?>
                            <td></td>
                        <?php else: ?>
                            <td>
                                <div class="btn-group-vertical btn-block">
                                    <a href="../Controllers/delete.php?who=post&id=<?= $posts->id ?>&id_users=<?= $posts->id_users ?>"
                                       class="btn btn-success btn-sm"> Удалить </a>
                                    <a href="edit_post_view.php?id_users=<?= $posts->id_users; ?>&id_post=<?= $posts->id; ?>"
                                       class="btn btn-success btn-sm"> Редактировать </a>
                                </div>
                            </td>

                        <?php endif; ?>

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
