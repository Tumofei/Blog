<?php
/**
 * Created by PhpStorm.
 * User: Timofei
 * Date: 24.03.2016
 * Time: 11:42
 */
include_once('../Models/User.php');
include_once('../Models/Post.php');

$who = trim($_REQUEST['who']);
$id = trim($_REQUEST['id']);
$id_users = trim($_REQUEST['id_users']);


switch ($who) {
    case "user":
        User::deleteAll($id);
        header('Location: ../Views/user_list.php');
        break;
    case "post":
        Post::delete($id);
        $email = User::getById($id_users);
        $em = $email->email;
        header("Location: ../Views/user_posts.php?email=$em");
        break;
} ?>


