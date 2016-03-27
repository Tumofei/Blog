<?php

/**
 * Created by PhpStorm.
 * User: Timofei
 * Date: 17.03.2016
 * Time: 10:00
 */
include_once('../Controllers/Connect.php');
include_once('Post.php');
include_once('Table.php');

class User extends Table
{
    private $name;
    private $email;
    private $id;
    private $password;
    private $permission;


    public function __set($prop, $val)
    {
        $this->$prop = $val;
    }

    public function __get($prop)
    {
        return $this->$prop;
    }

    public static function init($row)
    {
        $user = new User();
        $user->id = $row[0];
        $user->name = $row[1];
        $user->email = $row[2];
        $user->password = $row[3];
        $user->permission = $row[4];
        return $user;
    }

    public function save()
    {
        $add = new connect();
        $link = $add->connect();
        if ($this->id) {

            $result = mysqli_query($link, "UPDATE users SET name = \"$this->name\", email = \"$this->email\" , password = \"$this->password\" , permission = \"$this->permission\" WHERE id = $this->id;");

        } else {
            $result = mysqli_query($link, "INSERT INTO users (name, email, password, permission) VALUES (\"$this->name\", \"$this->email\" ,  \"$this->password\" , \"$this->permission\");");
        }
        return $result;

    }

    public static function deleteAll($id)
    {
        $add = new connect();
        $link = $add->connect();
        $delete_user = mysqli_query($link, "DELETE FROM users WHERE id = $id;");
        $delete_posts = mysqli_query($link, "DELETE FROM posts WHERE id_users = $id;");
        return $delete_user;
    }

    public static function getName()
    {
        return 'users';
    }

    public function getPostCount()
    {
        $add = new Connect();
        $link = $add->connect();
        $result = mysqli_query($link, "SELECT COUNT(id_users) FROM posts WHERE id_users=$this->id  GROUP BY id_users;");
        $row = mysqli_fetch_array($result);
        $count = $row[0];
        return $count;

    }

    public static function getByEmail($email)
    {
        $add = new Connect();
        $link = $add->connect();

        $result = mysqli_query($link, "SELECT * FROM users WHERE email = \"$email\"");
        $row = mysqli_fetch_array($result);
        $user = User::init($row);
        return $user;
    }

    public static function checkEmail($email)
    {
        $add = new Connect();
        $link = $add->connect();
        $result = mysqli_query($link, "SELECT id, name, email FROM users WHERE email = \"$email\"");
        if (mysqli_num_rows($result) == 0) {
            //echo "Такого пользователя нет";
            return $check = false;
        } else {
            //echo "Такой ползователь есть";
            return $check = true;
        }
    }

    public function getUserPosts()
    {

        $posts = Post::getByUserId($this->id);
        return $posts;
    }
}