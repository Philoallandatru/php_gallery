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
    redirect("users.php");
}
$id = $_GET['id'];

$user = User::find_by_id($id);
if ($user) {
    $session->message("The user has been deleted!");
    $user->delete();
    redirect("users.php");
} else {
    redirect("users.php");
}

?>