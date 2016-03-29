<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <title>Авторизация</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bootstrap/css/view.css" rel="stylesheet">
    <script type="text/javascript" src="../js/valida.2.1.6.js"></script>
    <style>
        body {
            background: url(../images/1.jpg)
        }
    </style>

</head>
<body>
<div class="container">
    <div class="row">
        <div class="well col-lg-6 col-lg-offset-3">

            <!-- center page------------------->
            <div class="weight">
                <div class="form-group">
                    <form action="" class="valida" id="form" method="post" role="form">
                        <fieldset>
                            <div class="form-group">
                                <label for="email">Email:</label><br/>
                                <input type="text" name="email" id="email" placeholder="Введите email"
                                       class="form-control"
                                       required="true" filter="email" data-invalid="Must be a valid email address"
                                       size="30">


                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label><br/>
                                <input type="password" name="password" id="password" placeholder="Введите пароль"
                                       class="form-control"
                                       filter="text" required="true"><br/>

                                <br/>
                            </div>
                            <div style="color: red" id="results"></div>
                            <button type="submit" name="submit" id="submit" class="btn btn-block btn-success">Войти<br/>
                            </button>
                        </fieldset>
                    </form>

                </div>

                <div>
                    <a href="/index.php" class="btn btn-success"><span class="glyphicon glyphicon-home"></span> На
                        главную </a>
                </div>

                <!-- center page------------------->
            </div>
        </div>
    </div>

</div>


<script type="text/javascript" src="../js/jquery-2.2.2.min.js"></script>
<script type="text/javascript" src="../js/valida.2.1.6.js"></script>
<script type="text/javascript" src="../js/validation.js"></script>
<script type="text/javascript" src="../js/login.js"></script>
</body>
</html>
