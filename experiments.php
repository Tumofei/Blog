<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> Посты пользователя </title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .weight {
            width:20%;
            margin:20px;
        }

    </style>
</head>
<body>
<div class="weight">
    <div class="form-group" >
        <form action="experiments.php" method="post" role="form">
            <fieldset>
                <label for="name">Email:</label><br/>
                <input type="text" name="email" size="30" class="form-control" placeholder="Введите email пользователя"><br/>
                <button type="submit" name="submit" class="btn btn-block btn-success">Найти пользователя<br/>
            </fieldset>
            <br/>
        </form>
    </div>
</div>

<?php
require ('User.php');



$email=trim($_REQUEST['email']);

$user = User::getByEmail($email);
$posts_users = $user->getUserPosts();


?>

<table class="table table-striped table-bordered table-hover table-condensed weight">
    <h4 class="text-success" style="margin:20px"> Список постов <?=$user->name?> : </h4>
    <tr>
        <th>Название</th>
        <th>Пост</th>
        <th>Дата</th>
    </tr>
    <?php
    foreach ($posts_users as $posts): ?>
        <tr>
            <td><?=$posts->name_post?></td>
            <td> <?=$posts->content?> </td>
            <td> <?=$posts->date_create?></td>
        </tr>
    <?php endforeach;?>
</table>



</body>
</html>