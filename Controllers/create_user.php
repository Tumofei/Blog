<?php

require ('../Models/User.php');

$name = trim($_REQUEST['name']);
$email = trim($_REQUEST['email']);
$check = User::checkEmail($email);
if ($check === TRUE){
    //die("This user already exists in the database");
    header('Refresh: 3; url=../Views/create_user.html');
    echo 'This user already exists in the database. After 3 seconds. you will be redirected.';

} else {

    $user = new User();
    $user->__set('name', $name);
    $user->__set('email', $email);
    $user->save();
    header('Refresh: 2, url=../Views/create_user.html');
    echo "User added";
}
