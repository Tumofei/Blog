<?php

/**
 * Created by PhpStorm.
 * User: Timofei
 * Date: 18.03.2016
 * Time: 9:42
 */

include_once ('Connect.php');
class Post
{
 private $id_users;
 private $name_post;
 private $content;
 private $date_create;
 private $id;

    public function __set($prop, $val)
    {
        $this->$prop = $val;
    }
    public function __get($prop)
    {
        return $this->$prop;
    }


    protected function initPost($row){
        $post = new Post();
        $post->id = $row[0];
        $post->name_post = $row[1];
        $post->content = $row[2];
        $post->date_create = $row[3];
        $post->id_users = $row[4];
        return $post;
    }


    public static function getById($id){
    $add = new Connect();
    $link=$add->connect();

    $result = mysqli_query($link,"SELECT id, name_post, content, date_create, id_users FROM posts WHERE id = $id");
    $row = mysqli_fetch_array($result);
    $post = self::initPost($row);
    return $post;
    }

    public static function getAll(){
        $add = new Connect();
        $link=$add->connect();
        $result = mysqli_query($link,"SELECT id, name_post, content,  date_create, id_users  FROM posts");
        $posts = array();
        $i=0;
        while ($row = mysqli_fetch_array($result)){
            $posts[$i] = self::initPost($row);
            $i++;

        }
        return $posts;
    }
    public static function getByUserId($id){
        $add = new Connect();
        $link=$add->connect();

        $result = mysqli_query($link,"SELECT id, name_post, content, date_create, id_users FROM posts WHERE id_users = $id");
        $posts = array();
        $i=0;
        while ($row = mysqli_fetch_array($result)){
            $posts[$i]= self::initPost($row);
            $i++;

        }
        return $posts;
    }
    /*public static function getByUserEmail($email){
        $add = new Connect();
        $link=$add->connect();

        $result = mysqli_query($link,"SELECT posts.id, posts.name_post, posts.content, posts.date_create, post.id_users FROM posts JOIN users ON posts.id_users = users.id WHERE users.email = $email");
        $posts = array();
        $i=0;
        while ($row = mysqli_fetch_array($result)){
            $posts[$i]= self::initPost($row);
            $i++;

        }
        return $posts;

    }*/




}
