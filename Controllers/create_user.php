<?php

require('../Models/User.php');

$name = trim($_REQUEST['name']);
$email = trim($_REQUEST['email']);
$password = trim($_REQUEST['password']);
$permission = trim($_REQUEST['permission']);
$check = User::checkEmail($email);
if ($check === TRUE) {
    $json = User::getByEmail($email);
    echo json_encode([
        'email' => $json->email,
        'result' => true
    ]);
    //die();
} else {

    $user = new User();
    $user->__set('name', $name);
    $user->__set('email', $email);
    $user->__set('password', $password);
    $user->__set('permission', $permission);
    $user->save();
    $json = User::getByEmail($email);
    echo json_encode([
        'email' => $json->email,
        'result' => false
    ]);

}
//die();
?>
