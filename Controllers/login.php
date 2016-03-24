<?php
/**
 * Created by PhpStorm.
 * User: Timofei
 * Date: 23.03.2016
 * Time: 23:10
 */

include_once('../Models/User.php');
session_start();

$email = trim($_REQUEST['email']);
$password = trim($_REQUEST['password']);


$user = User::getByEmail($email);
if ($password == $user->password) {
    $_SESSION['name'] = $user->name;
    $_SESSION['id'] = $user->id;
    echo json_encode(['result' => 'ok' , 'email' => $user->email ]);
    die();
} else {
    echo json_encode(['result' => 'neok']);

}
die();