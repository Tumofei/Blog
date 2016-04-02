<?php
include_once('../Models/Post.php');
include_once('../Models/User.php');

$id_users = trim($_REQUEST['id_users']);
$id = trim($_REQUEST['id_post']);
$name = trim($_REQUEST['name_post']);
$content = trim($_REQUEST['content']);


$post = Post::getById($id);
$post->name_post = $name;
$post->content = $content;
$post->save();

$js = User::getById($id_users);

//echo "Post edit";
?>
<script>
    document.location.href = '../Views/posts_list.php?email=<?=$js->email?>';
</script>