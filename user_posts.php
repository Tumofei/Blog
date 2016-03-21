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


<?php
require ('User.php');





$email=trim($_REQUEST['email']);

$check = User::checkEmail($email);
if ($check === TRUE){
    die("Данного пользователя нету в Базе данных");

} else {
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
    <?php endforeach; }?>
</table>



</body>
</html>