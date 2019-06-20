<?php
/**
 * Created by PhpStorm.
 * User: root1
 * Date: 2019-06-19
 * Time: 14:53
 */
include("includes/init.php");
if (!$session->is_signed_in()) {redirect("login.php");}

# check if the get method is set
if (empty($_GET['id'])) {
    redirect("comment_photo.php");
}
$id = $_GET['id'];

$comment = Comment::find_by_id($id);
if ($comment) {
    $comment->delete();
    redirect("comment_photo.php?id=$comment->photo_id");
} else {
    redirect("comment_photo.php");
}



?>