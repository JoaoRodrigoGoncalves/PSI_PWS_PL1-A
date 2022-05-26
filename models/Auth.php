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
        /**
         * Procuramos por um utilizador com o email indicado.
         * Caso não seja encontrado, devolvemos falso. Se for
         * encontrado, verificamos se a palavra-passe está correta.
         * Se a palavra-passe estiver correta, adicionamos o nome
         * do utilizador e o email à sessão e devolvemos "true",
         * caso contrário devolvemos falso.
         */
        try
        {
            $user = User::find_by_email($email);
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

    public function getRole()
    {
        if($this->isLoggedIn())
        {
            return User::find_by_email($_SESSION['email'])->role;
        }
        return null;
    }
}