<?php

class SiteController extends BaseAuthController
{
    public function index(){
        $this->RenderView('site', 'index', []);
    }
}