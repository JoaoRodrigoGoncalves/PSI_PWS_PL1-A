<?php

require_once './controllers/BaseController.php';
require_once  "./models/Login.php";

class BaseAuthController extends BaseController
{
    protected function loginFilter(){
       $login = new Login();
       if(!$login->isLoggedIn()){
           header("Location: ./router.php?".INVALID_ACCESS_ROUTE);
       }

    }
}