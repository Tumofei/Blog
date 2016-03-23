<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> Посты пользователя </title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .weight {
            width:95%;
            margin:20px;
        }

    </style>
</head>
<body>


<?php
require ('../Models/User.php');





$email=trim($_REQUEST['email']);


$user = User::getByEmail($email);
$posts_users = $user->getUserPosts();

?>

<div class="container">
    <div class="row">
        <div class="well col-lg-6 col-lg-offset-3">
            <!-- center page------------------->

<table class="table table-striped table-bordered table-hover table-condensed weight">
    <h4 class="text-success" style="margin:20px"> Список постов <?=$user->name?> : </h4>
    <tr>
        <th>Название</th>
        <th>Пост</th>
        <th>Дата</th>
    </tr>
    <?php
    if (count($posts_users)==0): ?>
        <tr>
            <td colspan="3"><?='This  user  has  no  posts'?></td>

        </tr>

    <?php endif;
    foreach ($posts_users as $posts): ?>
        <tr>
            <td><?=$posts->name_post?></td>
            <td> <?=$posts->content?> </td>
            <td> <?=$posts->date_create?></td>
        </tr>
    <?php endforeach;?>
</table>
<div class="weight">
    <a href="createsend_post.php?id=<?= $user->id?>" class="btn  btn-success">Добавить пост</a>
    <a href="/index.html" class="btn btn-success"><span class="glyphicon glyphicon-home"></span> На главную </a>
</div>
            <!-- center page------------------->
            </div>
        </div>
    </div>

</body>
</html>