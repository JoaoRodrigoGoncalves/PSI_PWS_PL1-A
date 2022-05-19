<?php
require_once './controllers/BaseAuthController.php';

class SiteController extends BaseAuthController
{
    public function index(){
        $this->RenderView('site', 'index');
    }
}