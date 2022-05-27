<?php
require_once './controllers/BaseAuthController.php';

class SiteController extends BaseAuthController
{
    public function index(){
        $auth = new Auth();

        if($auth->isLoggedIn())
        {
            $this->RedirectToRoute('dashboard', 'index');
        }
        else
        {
            $this->RenderView('site', 'index');
        }
    }
}