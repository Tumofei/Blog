<?php

require ('../Models/User.php');

$name = trim($_REQUEST['name']);
$email = trim($_REQUEST['email']);
$check = User::checkEmail($email);
if ($check === TRUE){
    ?>
    <script>
    document.location.href = '../Views/user_posts.php?email=<?=$email?>';
    </script>

<?php
} else {

    $user = new User();
    $user->__set('name', $name);
    $user->__set('email', $email);
    $user->save();
    //header('Refresh: 2, url=../Views/create_user.html');
    echo "User added";?>
<script>
    document.location.href = '../Views/user_posts.php?email=<?=$email?>';
</script>
<?php } ?>
