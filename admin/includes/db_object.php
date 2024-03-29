<?php
/**
 * Created by PhpStorm.
 * User: root1
 * Date: 2019-06-18
 * Time: 14:08
 */

/**
 * Class Db_object
 * Notes
 *  1. You should user static:: instead of self::
 */

class Db_object {

    public $tmp_path;
    public $custom_errors = array(); # your own custom errors
    public $upload_errors = array (
        UPLOAD_ERR_OK => "There is no error",
        UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload max filesize limit",
        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the max filesize limit",
        UPLOAD_ERR_PARTIAL => "PARTIAL ERROR",
        UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded",
        UPLOAD_ERR_NO_FILE => "No file was uploaded",
        UPLOAD_ERR_NO_TMP_DIR => "Missing Temporary folder",
        UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk",
        UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload"
    );

    public static function find_all() {
        return static::find_by_query("SELECT * FROM " .static::$db_table . " ");
    }

    public static function find_by_id($id) {
        $the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id = '$id'");
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    /**
     * @param $sql
     * @return array - the array of objects
     */
    public static function find_by_query($sql) {
        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();
        while ($row = mysqli_fetch_array($result_set)) {
            $the_object_array[] =static::instantiation($row);
        }
        return $the_object_array;
    }

    public function has_the_attribute($the_attribute) {
        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $object_properties);
    }

    public static function instantiation($the_record) {
//        $calling_class = get_called_class();
//        $the_object = new $calling_class;
        $the_object = new static();

        foreach ($the_record as $the_attribute => $value)  {
            if ($the_object->has_the_attribute($the_attribute)) {
                $the_object->$the_attribute = $value;
            }
        }
        return $the_object;
    }

    public function save() {
        return isset($this->id) ? $this->update() : $this->create();
    }

    /**
     * create user in the database according the attributes in
     * the instance
     * @return bool -
     */
    public function create() {
        global $database;
        $properties = $this->properties();

        $sql = "INSERT INTO ". static::$db_table ." (". implode(",", array_keys($properties)) .") ";
        $sql .= "VALUES('". implode("','", array_values($properties))."')";
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
        $properties = $this->properties(); # array of prop. => prop. value
        $properties_pairs = array();
        foreach ($properties as $key => $value) {
            $properties_pairs[] = "{$key} = '{$value}'";
        }

        $id = $database->escape_string($this->id);
        $sql = "UPDATE ". static::$db_table ." SET ";
        $sql .= implode(", ", $properties_pairs);
        $sql .= " WHERE id = '$id'";

        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1);
    }

    public function delete() {
        global $database;
        # check if there is this row to be deleted.

        $sql = "DELETE from " . static::$db_table ." WHERE id = {$database->escape_string($this->id)} LIMIT 1";
        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1);
    }

    public function properties() {
        global $database;
        $properties = array();
        foreach (static::$db_table_fields as $db_field) {
            if (property_exists($this, $db_field)) {
                $properties[$db_field] = $database->escape_string($this->$db_field);
            }
        }
        return $properties;
    }

    public static function count_all() {
        global $database;
        $sql = "SELECT COUNT(*) FROM " . static::$db_table;
        $result_set = $database->query($sql);
        $row = mysqli_fetch_array($result_set);

        return array_shift($row);
    }



}