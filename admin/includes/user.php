<?php
/**
 * Created by PhpStorm.
 * User: root1
 * Date: 2019-06-17
 * Time: 18:45
 */


class User {
    public $id;
    public $username;
    public $firstname;
    public $lastname;
    public $password;

    public static function find_all_users() {
        return self::find_this_query("SELECT * FROM users");
    }

    public static function find_user_by_id($user_id) {
        $the_result_array =  self::find_this_query("SELECT * FROM users WHERE id = '$user_id'");
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    /**
     * @param $sql
     * @return array - the array of objects
     */
    public static function find_this_query($sql) {
        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();
        while ($row = mysqli_fetch_array($result_set)) {
            $the_object_array[] = self::instantiation($row);
        }
        return $the_object_array;
    }

    private function has_the_attribute($the_attribute) {
        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $object_properties);
    }

    public static function instantiation($the_record) {
        $the_object = new self;
        foreach ($the_record as $the_attribute => $value)  {
            if ($the_object->has_the_attribute($the_attribute)) {
                $the_object->$the_attribute = $value;
            }
        }
        return $the_object;
    }

    public function save() {
        
    }

    /**
     * create user in the database according the attributes in
     * the instance
     * @return bool -
     */
    public function create() {
        global $database;
        $username = $database->escape_string($this->username);
        $password = $database->escape_string($this->password);
        $lastname = $database->escape_string($this->lastname);
        $firstname = $database->escape_string($this->firstname);
        $sql = "INSERT INTO users (username, password, firstname, lastname) ";
        $sql .= "VALUES('$username', '$password', '$firstname', '$lastname')";
        if ($database->query($sql)) {
            $this->id = $database->the_insert_id();
            return true;
        } else {
            return false;
        }
    }

    /**
     * update the user information in the database according to
     * the attributes in the instance
     * @return bool
     */
    public function update() {
        global $database;
        $username = $database->escape_string($this->username);
        $password = $database->escape_string($this->password);
        $lastname = $database->escape_string($this->lastname);
        $firstname = $database->escape_string($this->firstname);
        $id = $database->escape_string($this->id);
        $sql = "UPDATE users SET username = '$username',";
        $sql .= "password = '$password', ";
        $sql .= "firstname = '$firstname', ";
        $sql .= "lastname = '$lastname' WHERE id = '$id'";

        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1);
    }

    public function delete() {
        global $database;
        $sql = "DELETE from users WHERE id = {$database->escape_string($this->id)} LIMIT 1";
        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1);
    }


    /**
     * @param $username
     * @param $password
     * @return bool|mixed - if the user information is right, return the array
     */
    public static function verify_user($username, $password) {
        global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);
        $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password' LIMIT 1";

        $the_result_array =  self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }




}