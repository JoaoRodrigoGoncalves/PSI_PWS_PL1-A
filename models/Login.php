<?php

class Login{

    public function __construct()
    {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
    }

    public function checkLogin($username, $password): bool
    {
        if ($username == "admin" && $password == '1234'){
            $_SESSION['email'] = $username;
            return true;
        }
        return false;
    }

    public function isLoggedIn(): bool
    {
        return isset($_SESSION['email']);
    }

    public function logOut() {
        if (isset($_SESSION))
            session_destroy();
    }

    public function getUsername(){
        if($this->isLoggedIn())
            return $_SESSION['name'];
        else
            return null;
    }
}