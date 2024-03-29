<?php
/**
 * Created by PhpStorm.
 * User: root1
 * Date: 2019-06-17
 * Time: 17:17
 * @property bool is_signed_in
 */

class Session {
    private $signed_in = false;
    public $user_id;
    public $message;
    public $count;

    function __construct() {
        session_start();
        $this->visitor_count();
        $this->check_the_login();
        $this->check_message();
    }

    private function check_message() {
        if (isset($_SESSION['message'])) {
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $this->message = "";
        }

    }

    public function visitor_count() {
        if (isset($_SESSION['count'])) {
            return $this->count = $_SESSION['count']++;
        } else {
            return $_SESSION['count'] = 1;
        }
    }

    /**
     * set the $_SESSION
     * @param string $msg
     * @return string -
     */
    public function message($msg="") {
        if (!empty($msg)) {
            $_SESSION['message'] = $msg;
        } else {
            return $this->message;
        }
        return $msg;
    }

    public function is_signed_in() {
        return $this->signed_in ;
    }

    public function check_the_login() {
        if (isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
            $this->signed_in = true;
        } else {
            unset($this->user_id);
            $this->signed_in = false;
        }
    }

    public function login($user) {
        if ($user) {
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $_SESSION['user_id'] = $user->id;
            $this->signed_in = true;
        }
    }

    public function logout() {
        unset($_SESSION['user_id'] );
        unset($this->user_id);
        $this->signed_in = false;
    }

}


$session = new Session();
$message = $session->message();