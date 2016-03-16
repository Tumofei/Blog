User_list.php         Выводит список пользователей и количество постов пользователя из базы данных 
User_posts.php        Выводит список постов пользователя 
login.html            Форма для добавления пользователя
login.php             Скрипт для добавления пользователя
db.sql                Сreate таблицы 
connect.php           Соединение и выбор базы данных
local_params.php Данные базы данных
Описание файла local_params.php
<?php
return [
    'hostname' => 'localhost',
    'dbName' => 'Hometask',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];