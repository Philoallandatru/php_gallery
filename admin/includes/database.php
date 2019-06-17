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

    public function escape_string($string) {
        # return $this->connection->real_escape_string($string);
        return mysqli_real_escape_string($this->connection, $string);
    }
}

$database = new Database();
$database->open_db_connection();


?>