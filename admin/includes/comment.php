<?php
/**
 * Created by PhpStorm.
 * User: root1
 * Date: 2019-06-17
 * Time: 18:45
 */


class Comment extends Db_object {
    protected static $db_table = "comments";
    protected static $db_table_fields = array('photo_id', 'author', 'body', 'user_id');
    public $user_id;
    public $photo_id;
    public $author;
    public $body;

    public static function create_comment($photo_id, $author="John", $body="", $user_id=22) {
        if (!empty($photo_id) && !empty($author) && !empty($body))  {
            $comment = new Comment();
            $comment->photo_id = $photo_id;
            $comment->author = $author;
            $comment->body = $body;
            $comment->user_id = $user_id;
            return $comment;
        } else {
            return false;
        }
        return true;
    }

    public static function find_the_comments($photo_id=0) {
        global $database;
        $photo_id = $database->escape_string($photo_id);
        $sql = "SELECT * from " . self::$db_table . " WHERE photo_id = " . $photo_id . " ORDER BY photo_id ASC";
        return self::find_by_query($sql);
    }


}