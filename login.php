<?php

require ('User.php');

$name = trim($_REQUEST['name']);
$email = trim($_REQUEST['email']);
$user = new user();
$user->__set('name',$name);
$user->__set('email',$email);
$user->save();
//echo "User added";
header('Refresh: 0, url=/login.html');
