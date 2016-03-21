<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> Список пользователей:</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .weight {
            width:20%;
            margin:20px;
        }
    </style>
</head>
<body>

<table class="table table-striped table-bordered table-hover table-condensed weight">
    <h4 class="text-success" style="margin:20px"> Список пользователей: </h4>
    <tr>
        <th>Имя</th>
        <th>E-mail</th>
        <th>Количество постов</th>
    </tr>
    <?php
    require ('../Models/User.php');
    $arr_users = User::getAll();
    foreach ($arr_users as $users):?>
        <tr>
            <td> <a href="../Views/user_posts.php?email=<?=$users->email?>"> <?=$users->name?></a> </td>
            <td>  <?=$users->email?> </td>
            <td> <?=$users->getPostCount();?> </td>
        </tr>
    <?php endforeach;?>

</table>
</body>
</html>