<?php
/**
 * Created by PhpStorm.
 * User: root1
 * Date: 2019-06-18
 * Time: 09:38
 */
require_once("includes/header.php");
$session->logout();

redirect("login.php");


?>