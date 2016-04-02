<?php
session_start();
$time = time();
if ($_SESSION AND $time - $_SESSION['time'] > 60 * 20) {
    session_destroy();
} ?>


<div class="container">
    <div class="row">
        <div class="well  col-xs-3  affix" style="margin-top: 19%; width: 294px; background-color: #B7FFB7;">
            <?php if ($_SESSION) :
                $name = $_SESSION['name'];
                $email = $_SESSION['email'];
                $role = $_SESSION['name_role'];
                ?>

                <p class="text-center ">Hello, <?= $name ?>, you are: <?= $role ?> </p>
                <a href="../Controllers/logout.php" class="btn btn-block btn-success">Logout</a>
            <?php else: ?>
                <a href="../Views/login_view.php" class="btn btn-block btn-success">Login</a>
            <?php endif; ?>
        </div>
    </div>

</div>

