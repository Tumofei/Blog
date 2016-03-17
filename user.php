<?php

/**
 * Created by PhpStorm.
 * User: Timofei
 * Date: 17.03.2016
 * Time: 10:00
 */
require ('connect.php');

class user
{
    private $name;
    private $email;
    private $id;

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    public function save()
    {
        $add = new connect();
        $link=$add->connect();
        if ($this->id) {

            $result = mysqli_query($link,"UPDATE users SET name = \"$this->name\", email = \"$this->email\" WHERE id = $this->id;");

        } else {
            $result = mysqli_query($link, "INSERT INTO users (name, email) VALUES (\"$this->name\", \"$this->email\");");
        }
        return $result;

    }

    public static function getById($id){

         return new user;
    }
}