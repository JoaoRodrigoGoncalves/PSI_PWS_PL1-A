<?php

require_once './controllers/BaseAuthController.php';
include_once './models/Login.php';

class  LoginController extends BaseAuthController {

    public function index(){
        $this->RenderView('login', 'index', []);
    }

    public function login(){
        if(isset($_POST['email'],$_POST['password']))
        {
            $login = new Login();
            if ($login->checkLogin($_POST['email'], $_POST['password']))
                $this->RedirectToRout('plano','index');
            else
                $this->RedirectToRout('login','index');
        }else{
            $this->index();
        }
    }

    public function logOut(){
        $login = new Login();
        $login->logOut();
        $this->RedirectToRout('login','index');
    }
}
