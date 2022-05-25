<?php

class UnidadeController extends BaseAuthController
{
    public function index()
    {
        $this->loginFilter();
        $unidades = Unidade::all();
        $this->RenderView('unidade', 'index', ['unidades' => $unidades]);
    }

    public function create()
    {
        $this->loginFilter();
        $this->RenderView('unidade', 'create');
    }
}