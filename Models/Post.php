<?php

/**
 * Created by PhpStorm.
 * User: Timofei
 * Date: 18.03.2016
 * Time: 9:42
 */

include_once ('../Controllers/Connect.php');
include_once ('Table.php');
class Post extends Table
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

    public function save()
    {
        $add = new Connect();
        $link = $add->connect();

        $result = mysqli_query($link,"INSERT INTO posts (id_users, name_post, content, date_create) VALUES (\"$this->id_users\" , \"$this->name_post\",\"$this->content\", CURDATE());");
        return $result;
    }

    public static function getName(){
        return 'posts';
    }

    public static function init($row){
        $post = new Post();
        $post->id = $row[0];
        $post->name_post = $row[1];
        $post->content = $row[2];
        $post->date_create = $row[3];
        $post->id_users = $row[4];
        return $post;
    }

    public static function getByUserId($id){
        $add = new Connect();
        $link=$add->connect();

        $result = mysqli_query($link,"SELECT * FROM posts WHERE id_users = $id");
        $posts = array();
        $i=0;
        while ($row = mysqli_fetch_array($result)){
            $posts[$i]= Post::init($row);
            $i++;

        }
        return $posts;
    }

}
