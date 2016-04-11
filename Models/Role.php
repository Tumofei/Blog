<?php
include_once(__DIR__ .'/../Helpers/Connect.php');
include_once('Table.php');

/**
 * Created by PhpStorm.
 * User: Timofei
 * Date: 28.03.2016
 * Time: 20:26
 */
class Role extends Table
{
    private $id;
    private $name;
    private $level;

    public function __set($prop, $val)
    {
        $this->$prop = $val;
    }

    public function __get($prop)
    {
        return $this->$prop;
    }

    public function save()
    {
        $add = new Connect();
        $link = $add->connect();

        $result = mysqli_query($link, "INSERT INTO role (id, name, level) VALUES (\"$this->id\" , \"$this->name\",\"$this->level\");");
        return $result;
    }

    public static function delete($id)
    {
        $add = new connect();
        $link = $add->connect();
        $delete_role = mysqli_query($link, "DELETE FROM role WHERE id = $id;");
        return $delete_role;
    }

    public static function getName()
    {
        return 'role';
    }

    public static function init($row)
    {
        $role = new Role();
        $role->id = $row[0];
        $role->name = $row[1];
        $role->level = $row[2];
        return $role;
    }
}