<?php
include_once ('../Models/Post.php');
include_once ('../Models/User.php');

$id = trim($_REQUEST['id']);
$name_post = trim($_REQUEST['name_post']);
$content = trim($_REQUEST['content']);

$post = new Post();
$post->__set('id_users', $id);
$post->__set('name_post', $name_post);
$post->__set('content', $content);
$post->save();

$js = User::getById($id);

echo "Post added";
?>
<script>
    document.location.href = '../Views/user_posts.php?email=<?=$js->email?>';
</script>
