<?php

require ('../Models/User.php');

$name = trim($_REQUEST['name']);
$email = trim($_REQUEST['email']);
$check = User::checkEmail($email);
if ($check === TRUE){
    die("This user already exists in the database");


} else {

    $user = new user();
    $user->__set('name', $name);
    $user->__set('email', $email);
    $user->save();
    //echo "User added";
    header('Refresh: 0, url=/create.html');
}
