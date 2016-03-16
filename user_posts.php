<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" 
  "http://www.w3.org/TR/html4/strict.dtd">
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title> Посты пользователя</title>
 </head>
 <body>
 <?php
 require ('connect.php');

 $res =  mysqli_query($link, "SELECT posts.name_post, posts.content, posts.date_create FROM posts JOIN users ON posts.id_users = users.id WHERE users.name = \"First_user\";");
 if (!$res) {
    die('Invalid query: ' . mysqli_error($link));
}

?>
 
    <table border='1'>
            <thead> Список постов First user: </thead>
            <tr>
                <th>Название</th>
                <th>Пост</th>
                <th>Дата</th>
            </tr>
    <?php
    while($row = mysqli_fetch_array($res)): ?>
        <tr>
            <td> <?=$row[0]?> </td>
            <td> <?=$row[1]?> </td>
            <td> <?=$row[2]?> </td>
        </tr>
    <?php endwhile;?>
    </table>

 

 </body>
</html>