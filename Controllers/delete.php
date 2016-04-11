<?php
/**
 * Created by PhpStorm.
 * User: Timofei
 * Date: 24.03.2016
 * Time: 11:42
 */
include_once('../Models/User.php');
include_once('../Models/Post.php');
include_once('../Models/Role.php');

$who = trim($_REQUEST['who']);
$id = trim($_REQUEST['id']);



switch ($who) {
    case "user":
        User::deleteAll($id);
        header('Location: ../Views/user_list.php');
        break;
    case "post":
        $id_users = trim($_REQUEST['id_users']);
        Post::delete($id);
        $email = User::getById($id_users);
        $em = $email->email;
        header("Location: ../Views/posts_list.php?email=$em");
        break;
    case "role":
        Role::delete($id);
        header('Location: ../Views/role_list.php');
        break;

} ?>


