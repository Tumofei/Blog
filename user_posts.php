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
 <form action="user_posts.php" method="post" role="form">
     <fieldset>
         <label for="name">Имя:</label><br/>
         <input type="text" name="user_name" size="30" class="form-control" placeholder="Введите имя"><br/>
         <button type="submit" name="submit" class="btn btn-block btn-success">Найти пользователя<br/>
     </fieldset>
     <br/>
     </form>
         </div>
     </div>

  <?php
 require ('connect.php');



 $user_name=trim($_REQUEST['user_name']);
$mysql = new Connect();
  $link =$mysql->connect();

 $res =  mysqli_query($link, "SELECT posts.name_post, posts.content, posts.date_create FROM posts JOIN users ON posts.id_users = users.id WHERE users.name = \"$user_name\";");
 if (!$res) {
    die('Invalid query: ' . mysqli_error($link));
}

?>
 
    <table class="table table-striped table-bordered table-hover table-condensed weight">
            <h4 class="text-success" style="margin:20px"> Список постов <?=$user_name?> : </h4>
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