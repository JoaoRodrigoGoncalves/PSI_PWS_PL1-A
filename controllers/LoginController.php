<?php

require_once './controllers/BaseAuthController.php';
include_once './models/Auth.php';

class  LoginController extends BaseAuthController
{

    public function index()
    {

        //if(User::count() > 0)
        //{
            $auth = new Auth();
            if(!$auth->isLoggedIn())
            {
                $this->RenderView('login', 'index', []);
            }
            else
            {
                $this->RedirectToRoute('site', 'index');
            }
        /*}
        else
        {
            $this->RedirectToRoute('setup', 'index');
        }*/
    }

    public function login()
    {
        $auth = new Auth();
        if(!$auth->isLoggedIn())
        {
            if(isset($_POST['email'],$_POST['password']))
            {
                if ($auth->checkLogin($_POST['email'], $_POST['password'])){
                    $debug = new Debugger();
                    $debug->debug_to_console("I'm here");
                    // TODO: Redirecionar para a rota correta
                    $this->RedirectToRoute('setup','index', []);
                }
                else
                    $this->RenderView('login', 'index', ["fail" => true]);
            }else{
                $this->RedirectToRoute('site', 'index', []);
            }
        }
        else
        {
            $this->RedirectToRoute('site', 'index');
        }
    }

    public function logOut()
    {
        $this->loginFilter();
        $auth = new Auth();
        $auth->logOut();
        $this->RedirectToRoute('login','index');
    }
}
