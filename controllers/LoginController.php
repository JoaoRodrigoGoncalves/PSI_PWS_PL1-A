<?php

require_once './controllers/BaseAuthController.php';
include_once './models/Login.php';

class  LoginController extends BaseAuthController {

    public function index(){
        if(User::count() > 0)
        {
            $this->RenderView('login', 'index', []);
        }
        else
        {
            $this->RedirectToRoute('setup', 'index');
        }
    }

    public function login(){
        if(isset($_POST['email'],$_POST['password']))
        {
            $login = new Login();
            if ($login->checkLogin($_POST['email'], $_POST['password']))
                $this->RedirectToRoute('plano','index');
            else
                $this->RedirectToRoute('login','index');
        }else{
            $this->index();
        }
    }

    public function logOut(){
        $login = new Login();
        $login->logOut();
        $this->RedirectToRoute('login','index');
    }
}
