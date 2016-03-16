<?php
require ('connect.php');

$name = trim($_REQUEST['name']);
$email = trim($_REQUEST['email']);
$res = mysqli_query($link, "INSERT INTO users (name, email) VALUES (\"$name\", \"$email\");");
if (!$res) {
    die('Неверный запрос: ' . mysqli_error($link));}
?>