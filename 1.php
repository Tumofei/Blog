<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" 
  "http://www.w3.org/TR/html4/strict.dtd">
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title> Список пользователей</title>
 </head>
 <body>
 <?php
 $filename = 'local_params.php';

 if (file_exists($filename)) {
     $db = include('local_params.php');
     $hostname = $db['hostname'];
     $username = $db['username'];
     $password = $db['password'];
     $dbName = $db['dbName'];
 } else {
     die ("The file $filename does not exist");
 }

 $db = include('local_params.php');
 $hostname = $db['hostname'];
 $username = $db['username'];
 $password = $db['password'];
 $dbName = $db['dbName'];
 $link = mysqli_connect($hostname, $username, $password);
 if (!$link) {
     die('Ошибка соединения: ' . mysqli_error($link));
 }
 echo 'Успешно соединились' . "</br>";
 
 $voice = mysqli_select_db($link, $dbName);
 if (!$voice) {
    die('Не удалось соединиться : ' . mysqli_error($link));
 }
 


 $res =  mysqli_query($link, "SELECT users.name, users.email,  COUNT(id) FROM posts JOIN users ON posts.id_users = users.id GROUP BY id;");
 if (!$res) {
    die('Неверный запрос: ' . mysqli_error($link));
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
                <td>  <?=$row[0]?> </td>
                <td>  <?=$row[1]?> </td>
                <td> <?=$row[2]?> </td>
            </tr>
        <?php endwhile;?>

    </table>
 </body>
</html>