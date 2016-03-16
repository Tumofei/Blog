<?php
$filename = 'local_params.php';

if (file_exists($filename)) {
    $db = include('local_params.php');
    $hostname = $db['hostname'];
    $username = $db['username'];
    $password = $db['password'];
    $dbName = $db['dbName'];
} else {
    die ("The file $filename does not exist");
}


$link = mysqli_connect($hostname, $username, $password);
if (!$link) {
    die('Error connect: ' . mysqli_error($link));
}
//echo 'Successfully connected' . "</br>";

$voice = mysqli_select_db($link, $dbName);
if (!$voice) {
    die('Error select database : ' . mysqli_error($link));
}
?>