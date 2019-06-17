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
//        if (!empty($the_result_array)) {
//            $first_item = array_shift($the_result_array);
//            return $first_item;
//        } else {
//            return false;
//        }
        # array shift gets the first variable
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
//        $the_object->password = $the_record['password'];
//        $the_object->id = $the_record['id'];
//        $the_object->username = $the_record['username'];
//        $the_object->lastname = $the_record['lastname'];
//        $the_object->firstname = $the_record['firstname'];
//        return $the_object;
        foreach ($the_record as $the_attribute => $value)  {
            if ($the_object->has_the_attribute($the_attribute)) {
                $the_object->$the_attribute = $value;
            }
        }
        return $the_object;
    }


}