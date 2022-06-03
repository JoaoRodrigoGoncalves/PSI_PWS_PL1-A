<?php

class DefinicoesController extends BaseAuthController
{
    public function index()
    {
        $this->loginFilter();
        $this->RenderView('definicoes', 'index');
    }
}