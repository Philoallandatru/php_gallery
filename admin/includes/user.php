<?php
/**
 * Created by PhpStorm.
 * User: root1
 * Date: 2019-06-17
 * Time: 18:45
 */


class User extends Db_object {
    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'password', 'firstname', 'lastname');
    public $id;
    public $username;
    public $password;
    public $firstname;
    public $lastname;

    /**
     * @param $username
     * @param $password
     * @return bool|mixed - if the user information is right, return the array
     */
    public static function verify_user($username, $password) {
        global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);
        $sql = "SELECT * FROM ". self::$db_table . " WHERE username = '$username' and password = '$password' LIMIT 1";

        $the_result_array =  self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

}