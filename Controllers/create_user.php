<?php

require('../Models/User.php');

$name = trim($_REQUEST['name']);
$email = trim($_REQUEST['email']);
$password = trim($_REQUEST['password']);
$role_id = trim($_REQUEST['role_id']);
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
    $user->__set('password', md5($password));
    $user->__set('role_id', $role_id);
    $user->save();
    $json = User::getByEmail($email);
    echo json_encode([
        'email' => $json->email,
        'result' => false
    ]);

}
//die();
?>
