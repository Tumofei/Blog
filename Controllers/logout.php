<?php
/**
 * Created by PhpStorm.
 * User: Timofei
 * Date: 24.03.2016
 * Time: 22:20
 */
session_start();
unset($_SESSION);
session_destroy();
header('Location: /index.html');
?>