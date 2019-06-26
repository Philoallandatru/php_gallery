<?php
/**
 * Created by PhpStorm.
 * User: root1
 * Date: 2019-06-17
 * Time: 18:45
 */

/**
 * Class Comment 评论类继承Db_object类
 */
class Comment extends Db_object {
    protected static $db_table = "comments"; # table name
    protected static $db_table_fields = array('photo_id', 'author', 'body', 'user_id'); # 属性数组，这是数据库中的列的名字
    public $user_id;
    public $photo_id;
    public $author;
    public $body;
    public $id;

    /**
     * @param $photo_id - 照片id
     * @param string $author - n
     * @param string $body -
     * @param int $user_id -
     *
     * 传入参数初始化一个评论对象
     * @return bool|Comment -
     */
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


    /**
     * @param int $photo_id
     * 找出所有的评论一张照片的评论
     * @return array -
     */
    public static function find_the_comments($photo_id=0) {
        global $database;
        $photo_id = $database->escape_string($photo_id);
        $sql = "SELECT * from " . self::$db_table . " WHERE photo_id = " . $photo_id . " ORDER BY photo_id ASC";
        return self::find_by_query($sql);
    }


}