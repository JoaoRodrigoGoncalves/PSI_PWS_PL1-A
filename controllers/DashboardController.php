<?php

class DashboardController extends BaseAuthController
{
    public function index()
    {
        $this->loginFilter();
        $auth = new Auth();
        if($auth->getRole() == 'cliente')
        {
            $this->RenderView('dashboard', 'index_Cliente');
        }
        else
        {
            $this->RenderView('dashboard', 'index_Funcionario');
        }
    }
}