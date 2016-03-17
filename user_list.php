<!DOCTYPE html>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title> Список пользователей:</title>
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

 require ('connect.php');

$mysql = new connect();
$link = $mysql->connect();
$res =  mysqli_query($link, "SELECT users.name, users.email,  COUNT(id_users) FROM posts RIGHT OUTER JOIN users ON users.id = posts.id_users GROUP BY name;");
 if (!$res) {
    die('Invalid query: ' . mysqli_error($link));
}

 ?>
    <table class="table table-striped table-bordered table-hover table-condensed weight">
        <h4 class="text-success" style="margin:20px"> Список пользователей: </h4>
            <tr>
                <th>Имя</th>
                <th>E-mail</th>
                <th>Количество постов</th>
            </tr>
     <?php

            while($row = mysqli_fetch_array($res)): ?>
            <tr>
                <td> <a href="/user_posts.php?user_name=<?=$row[0]?>"> <?=$row[0]?></a> </td>
                <td>  <?=$row[1]?> </td>
                <td> <?=$row[2]?> </td>
            </tr>
        <?php endwhile;?>

    </table>
 </body>
</html>