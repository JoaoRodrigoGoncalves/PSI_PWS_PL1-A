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
        $auth = new Auth();
        return in_array($auth->getRole(), $roles);
    }

}