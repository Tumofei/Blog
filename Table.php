<?php

/**
 * Created by PhpStorm.
 * User: Timofei
 * Date: 20.03.2016
 * Time: 4:27
 */

include_once ('Connect.php');
include_once('Post.php');
include_once('User.php');

class Table
{
    public $table;


    public static function getById($id){
        $table = static::getName();
        $add = new Connect();
        $link=$add->connect();

        $result = mysqli_query($link,"SELECT * FROM $table WHERE id = $id");
        $row = mysqli_fetch_array($result);
        $object = static::init($row);
        return $object;
    }

    public static function getAll(){

        $table = static::getName();
        $add = new Connect();
        $link=$add->connect();
        $result = mysqli_query($link,"SELECT * FROM $table");

        $objects = array();
        $i=1;
        while ($row = mysqli_fetch_array($result)){
            $objects[$i] = static::init($row);
            $i++;

        }
        return $objects;
    }

}