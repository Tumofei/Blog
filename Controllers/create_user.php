<?php

require('../Models/User.php');

$name = trim($_REQUEST['name']);
$email = trim($_REQUEST['email']);
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
    $user->save();
    $json = User::getByEmail($email);
    echo json_encode([
        'email' => $json->email,
        'result' => false
    ]);

}
//die();
?>
