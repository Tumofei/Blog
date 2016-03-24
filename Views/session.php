<?php
session_start();
if ($_SESSION ) :
    $name = $_SESSION['name'];
    $role = $_SESSION['permission']?>
    <div class="well  col-lg-2  affix">
        <p class="text-center">Hello, <?= $name ?>, you are: <?= $role ?> </p>
        <a href="../Controllers/logout.php" class="btn btn-block btn-success">Logout</a>
    </div>
<?php endif; ?>