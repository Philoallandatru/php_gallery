<?php
/**
 * Created by PhpStorm.
 * User: root1
 * Date: 2019-06-19
 * Time: 14:53
 */
include("includes/init.php");
if (!$session->is_signed_in()) {redirect("login.php");}


$is_admin = User::is_admin_id($session->user_id);
$comments_page = "user_comments.php";
if ($is_admin) {
    $comments_page = "comments.php";
}

# check if the get method is set
if (empty($_GET['id'])) {
    redirect("comments.php");
}
$id = $_GET['id'];

$comment = Comment::find_by_id($id);
if ($comment) {
    $comment->delete();
    redirect($comments_page);
} else {
    redirect($comments_page);
}



?>