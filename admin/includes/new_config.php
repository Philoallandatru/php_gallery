<?php


# database connection constants
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "root";
$db['db_name'] = "gallery_db";

foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}

?>