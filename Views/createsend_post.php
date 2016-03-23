<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset= "UTF-8">
    <title>Добавление поста</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="../js/valida.2.1.6.js" ></script>
    <link href="../bootstrap/css/view.css" rel="stylesheet">



</head>
<body>
<div class="container">
    <div class="row">
        <div class="well col-lg-6 col-lg-offset-3">

            <!-- center page------------------->
            <div class="weight">
                <div class="form-group" >
                    <form action="../Controllers/create_post.php" class="valida" id="form"  method="post" role="form">
                        <fieldset>
                            <input type="hidden" name="id" value="<?= trim($_REQUEST['id']) ?>" >
                            <label for="name">Название поста:</label><br/>
                            <input type="text"  name="name_post" id="name_post" placeholder="Введите название поста" class="form-control"
                                   required="true" ><br/>
                            <label for="email">Контент:</label><br/>
                <textarea type="text" name="content" id="content" placeholder="Ваш пост.." rows="5" class="form-control"
                          required="true" maxlength="500"  ></textarea><br/>
                            <button type="submit" name="submit" class="btn btn-block btn-success">Добавить пост<br/></button>

                        </fieldset>
                    </form>
                </div>

                <div>
                    <a href="/index.html" class="btn btn-success"><span class="glyphicon glyphicon-home"></span> На главную </a>
                </div>
            </div>

                <!-- center page------------------->
            </div>
        </div>
    </div>





<script type="text/javascript" src="../js/jquery-2.2.2.min.js"></script>
<script type="text/javascript" src="../js/valida.2.1.6.js" ></script>
<script type="text/javascript" src="../js/validation.js" ></script>
</body>
</html>
