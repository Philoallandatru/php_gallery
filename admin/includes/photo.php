<?php
/**
 * Created by PhpStorm.
 * User: root1
 * Date: 2019-06-18
 * Time: 23:05
 */

class Photo extends Db_object {

    protected static $db_table = "photos";
    protected static $db_table_fields = array('title', 'caption' , 'description', 'filename', 'alternate_text', 'type', 'size') ;

    public $id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;
    public $alternate_text;
    public $caption;
    public $upload_directory = "images";

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
            $this->filename = basename($file['name']);
            $this->tmp_path = $file['tmp_name']; # this is the temporary path that store the file
            $this->type = $file['type'];
            $this->size = $file['size'];
        }
    }

    public function picture_path() {
        return $this->upload_directory . DS . $this->filename;
    }


    /**
     * @return bool
     */
    public function save() {
        if ($this->id) {
            $this->update();
        } else {
            if (!empty($this->custom_errors)) {
                return false;
            }
            if (empty($this->filename) || empty($this->tmp_path)) {
                $this->custom_errors[] = "the file was not available.";
                return false;
            }
            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->filename;

            if (file_exists($target_path)) {
                $this->custom_errors[] = "This file '$this->filename' already exists.";
                return false;
            }

            /* move from temporary path to a new path */
            if (move_uploaded_file($this->tmp_path, $target_path)) {
                if ($this->create()) {
                    unset($this->tmp_path);
                    return true;
                }
            } else {
                $this->custom_errors[] = "The file directory probably doesn't have permissions.";
                return false;
            }
        }
    }

    public function delete_photo() {
        if ($this->delete()) {
            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory .$this->filename;
            return unlink($target_path);
        } else {
            return false;
        }
    }



}