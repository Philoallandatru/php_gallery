<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR); # define \ or / (different between Mac and Win)
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'Applications' . DS . 'MAMP' . DS . 'htdocs' . DS . 'PHP' . DS . 'PhotoGallery');
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT . DS . 'admin' . DS . 'includes');

/**
 *
 * Attention!!!!!!
 * the order you include these files are SIGNIFICANT!!!!
 *
 */
require_once("db_object.php");
require_once("functions.php");
require_once("database.php");
require_once("session.php");
require_once("user.php");
require_once(INCLUDES_PATH . DS . "photo.php");
require_once("new_config.php");
require_once("comment.php");

?>