<?php
/**
 * Created by PhpStorm.
 * User: root1
 * Date: 2019-06-17
 * Time: 18:45
 */


class User extends Db_object {
    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'password', 'firstname', 'lastname', 'user_image');
    public $id;
    public $username;
    public $password;
    public $firstname;
    public $lastname;
    public $user_image;
    public $upload_directory = "images";
    public $image_placeholder = "http://placehold.it/400x400&text=image";

    public function image_path_and_placeholder() {
        return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory . DS . $this->user_image;
    }

    /**
     * doing some error checking
     * @param $file - $_FILES['uploaded_file']
     * @return false if there is error for the file uploading
     */
    public function set_file($file) {
        if (empty($file) || !$file || !is_array($file)) {
            $this->custom_errors[] = "This was no file uploaded here";
            return false;
        } else if ($file['error'] != 0) {
            $this->custom_errors[] = $this->upload_errors[$file['error']]; # save official errors in your error array
            return false;
        } else {
            $this->user_image = basename($file['name']);
            $this->tmp_path = $file['tmp_name']; # this is the temporary path that store the file
            $this->type = $file['type'];
            $this->size = $file['size'];
        }
    }

    /**
     * @return bool
     */
    public function upload_photo() {
        if (!empty($this->custom_errors)) {
            return false;
        }
        if (empty($this->user_image) || empty($this->tmp_path)) {
            $this->custom_errors[] = "the file was not available.";
            return false;
        }
        $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;

        if (file_exists($target_path)) {
            $this->custom_errors[] = "This file '$this->user_image' already exists.";
            return false;
        }

        /* move from temporary path to a new path */
        if (move_uploaded_file($this->tmp_path, $target_path)) {
            unset($this->tmp_path);
            return true;
        } else {
            $this->custom_errors[] = "The file directory probably doesn't have permissions.";
            return false;
        }
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
        $sql = "SELECT * FROM ". self::$db_table . " WHERE username = '$username' and password = '$password' LIMIT 1";

        $the_result_array =  self::find_by_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public function ajax_save_user_image($user_image, $user_id) {
        $this->user_image = $user_image;
        $this->id = $user_id;

    }

    public static function is_admin_id($user_id) {
        return $user_id == 22;
    }

    public static function duplicated_username($username) {
        global $database;
        $sql = "SELECT * FROM users WHERE username = '$username'";
        return $database->num_rows($sql);
    }


}

