<?php
session_start();
if ($_SESSION) :
    $name = $_SESSION['name'];
    $role = $_SESSION['permission'];
    $email = $_SESSION['email']?>
    <div class="container">
        <div class="row">
            <div class="well  col-lg-3  affix" style="margin-top: 19%; width: 294px">
                <p class="text-center ">Hello, <?= $name ?>, you are: <?= $role ?> </p>
                <a href="../Controllers/logout.php" class="btn btn-block btn-success">Logout</a>
            </div>
        </div>

    </div>

<?php else: ?>
    <div class="container">
        <div class="row">
            <div class="well  col-lg-3  affix" style="margin-top: 17%; width: 294px">

                <a href="../Views/login.html" class="btn btn-block btn-success">Login</a>
            </div>
        </div>

    </div>


<?php endif; ?>