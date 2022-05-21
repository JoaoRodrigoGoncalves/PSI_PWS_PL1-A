<?php

use ActiveRecord\RecordNotFound;

class Auth
{

    public function __construct()
    {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
    }

    public function checkLogin($email, $password): bool
    {
        try
        {
            $user = User::find(array('email' => $email));

            if($user != null)
            {
                if(password_verify($password, $user->password))
                {
                    $_SESSION['username'] = $user->username;
                    $_SESSION['email'] = $user->email;
                    return true;
                }
            }
            return false;
        }
        catch (RecordNotFound $_)
        {
            return false;
        }
    }

    public function isLoggedIn(): bool
    {
        return isset($_SESSION['email']);
    }

    public function logOut()
    {
        if (isset($_SESSION))
            session_destroy();
    }

    public function getUsername()
    {
        if($this->isLoggedIn())
            return $_SESSION['username'];
        else
            return null;
    }
}