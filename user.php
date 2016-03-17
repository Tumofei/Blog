<?php

/**
 * Created by PhpStorm.
 * User: Timofei
 * Date: 17.03.2016
 * Time: 10:00
 */
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


    public function saveUser()
    {
        $this->name = trim($_REQUEST['name']);
        $this->email = trim($_REQUEST['email']);
        if ($this->id) {

            $result = "UPDATE users SET name = \"$this->name\", email = \"$this->email\" WHERE id = $this->id;";

        } else {
            $result =  "INSERT INTO users (name, email) VALUES (\"$this->name\", \"$this->email\");";
        }
        return $result;

    }
}