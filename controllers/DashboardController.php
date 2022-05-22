<?php

class DashboardController extends BaseAuthController
{
    public function index()
    {
        $this->loginFilter();
        $this->RenderView('dashboard', 'index');
    }
}