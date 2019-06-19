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
    redirect("../photos.php");
}
$id = $_GET['id'];

$photo = Photo::find_by_id($id);
if ($photo) {
    $photo->delete_photo();
    redirect("../photos.php");
} else {
    redirect("../photos.php");
}



?>