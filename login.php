<?php
require ('connect.php');
require ('user.php');


$new = new user();
$new->saveUser();
$result=$new->saveUser();
$res = mysqli_query($link, $result);
if (!$res) {
    die('Неверный запрос: ' . mysqli_error($link));}
?>