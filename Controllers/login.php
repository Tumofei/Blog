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
$pass = trim($_REQUEST['password']);
$password = md5($pass);

$user = User::getByEmail($email);
if ($password == $user->password) {
    $_SESSION['name'] = $user->name;
    $_SESSION['email'] = $user->email;
    $_SESSION['id'] = $user->id;
    $_SESSION['role_id'] = $user->role_id;
    $_SESSION['name_role'] = $user->getRole()->name;
    $_SESSION['level_role'] = $user->getRole()->level;
    $_SESSION['time'] = time();
    echo json_encode(['result' => 'ok' , 'email' => $user->email ]);
    die();
} else {
    echo json_encode(['result' => 'ne ok']);

}
die();