<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Error </title>
    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/bootstrap/css/errorpage.css" rel="stylesheet">

</head>
<body>

<?php
$error_name = trim($_REQUEST['error_name']);
?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1> Oops!</h1>

                <div class="error-details">
                    <h3> Something went wrong, the error is: <?= $error_name ?> </h3>
                </div>
                <div class="error-actions">
                    <a href="/index.html" class="btn btn-success"><span class="glyphicon glyphicon-home"></span> На
                        главную </a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>


<?php
