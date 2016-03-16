<!DOCTYPE html>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title> Посты пользователя</title>
 </head>
 <body>
 <form action="user_posts.php" method="post">
     <fieldset>
         <label for="name">Имя:</label><br/>
         <input type="text" name="user_name" size="30"><br/>
         <input type="submit" value="Найти пользователя"><br/>
     </fieldset>
     <br/>

  <?php
 require ('connect.php');



 $user_name=trim($_REQUEST['user_name']);

 $res =  mysqli_query($link, "SELECT posts.name_post, posts.content, posts.date_create FROM posts JOIN users ON posts.id_users = users.id WHERE users.name = \"$user_name\";");
 if (!$res) {
    die('Invalid query: ' . mysqli_error($link));
}

?>
 
    <table border='1'>
            <thead> Список постов <?=$user_name?> : </thead>
            <tr>
                <th>Название</th>
                <th>Пост</th>
                <th>Дата</th>
            </tr>
    <?php
    while($row = mysqli_fetch_array($res)): ?>
        <tr>
            <td><?=$row[0]?></td>
            <td> <?=$row[1]?> </td>
            <td> <?=$row[2]?> </td>
        </tr>
    <?php endwhile;?>
    </table>

 

 </body>
</html>