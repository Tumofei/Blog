<?php
/**
 * Created by PhpStorm.
 * User: Timofei
 * Date: 28.03.2016
 * Time: 22:59
 */
include_once('../../Models/Role.php');

$name_role = trim($_REQUEST['name_role']);
$level = trim($_REQUEST['level']);

$role = new Role();
$role -> __set('name', $name_role);
$role -> __set('level', $level);
$role -> save();
//echo "Role added";
?>
<script>
    document.location.href = '../../Views/role_list.php';
</script>
