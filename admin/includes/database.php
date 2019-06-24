<?php

require_once("new_config.php");

class Database {
    public $connection;

    function __construct() {
        $this->open_db_connection();
    }

    public function open_db_connection() {
        # $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (mysqli_connect_errno()) {
            die("Database connection failed badly.") . mysqli_error();
        }
    }

    public function num_rows($sql) {
        $result = $this->connection->query($sql);
        $this->confirm_query($result);
        return mysqli_num_rows($result);
    }

    private function confirm_query($result) {
        if (!$result) {
            die("Query failed") . $this->connection->error();
        }
    }

    public function query($sql) {
        $result = $this->connection->query($sql);
        # $result = mysqli_query($this->connection, $sql);
        $this->confirm_query($result);
        return $result;
    }

    /**
     * avoid injection
     * @param $string
     * @return string
     */
    public function escape_string($string) {
        $escape_stirng = mysqli_real_escape_string($this->connection, $string); # avoid sql injection
        $escape_stirng = htmlentities($escape_stirng); # avoid javascript and html injection
        return $escape_stirng;
    }

    public function the_insert_id() {
        return mysqli_insert_id($this->connection);
    }
}

$database = new Database();
$database->open_db_connection();


?>