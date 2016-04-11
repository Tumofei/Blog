<?php

/**
 * Created by PhpStorm.
 * User: Timofei
 * Date: 20.03.2016
 * Time: 4:27
 */

include_once(__DIR__ .'/../Helpers/Connect.php');
include_once('Post.php');
include_once('User.php');
include_once('Role.php');
class Table
{
    public $table;


    public static function getById($id)
    {
        $table = static::getName();
        $add = new Connect();
        $link = $add->connect();

        $result = mysqli_query($link, "SELECT * FROM $table WHERE id = $id");
        $row = mysqli_fetch_array($result);
        $object = static::init($row);
        return $object;
    }

    public static function getAll()
    {

        $table = static::getName();
        $add = new Connect();
        $link = $add->connect();
        $result = mysqli_query($link, "SELECT * FROM $table");

        $objects = array();

        while ($row = mysqli_fetch_array($result)) {
            $objects[] = static::init($row);


        }
        return $objects;
    }

}