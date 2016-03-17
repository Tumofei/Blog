<?php

require ('user.php');

$name = trim($_REQUEST['name']);
$email = trim($_REQUEST['email']);
$user = new user();
$user->setName($name);
$user->setEmail($email);
$user->save();
//echo "User added";
header('Refresh: 0, url=/login.html');
