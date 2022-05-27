<?php

require_once './controllers/BaseController.php';
require_once './models/Auth.php';

class BaseAuthController extends BaseController
{
    protected function loginFilter(){
       $login = new Auth();
       if(!$login->isLoggedIn()){
           header("Location: ./router.php?" . INVALID_ACCESS_ROUTE);
       }
    }

    protected function filterByRole($roles = [])
    {
        $this->loginFilter();
        $auth = new Auth();
        if(!in_array($auth->getRole(), $roles))
        {
            header('Location: ./router.php?' . INVALID_ACCESS_ROUTE);
        }
    }
}