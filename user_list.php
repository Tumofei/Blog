<!DOCTYPE html>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title> Список пользователей:</title>
 </head>
 <body>
 <?php

 require ('connect.php');


 $res =  mysqli_query($link, "SELECT users.name, users.email,  COUNT(id_users) FROM posts RIGHT OUTER JOIN users ON users.id = posts.id_users GROUP BY name;");
 if (!$res) {
    die('Invalid query: ' . mysqli_error($link));
}

 ?>
    <table border='1'>
            <thead> Список пользователей: </thead>
            <tr>
                <th>Имя</th>
                <th>E-mail</th>
                <th>Кол-во постов</th>
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