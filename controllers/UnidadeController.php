<?php

use ActiveRecord\RecordNotFound;

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

    public function store()
    {
        if(isset($_POST['unidade']))
        {
            $unidade = Unidade::create($_POST);

            if($unidade->is_valid())
            {
                $this->RedirectToRoute('unidade', 'index');
            }
            else
            {
                $this->RenderView('unidade', 'create', ['unidade' => $unidade]);
            }
        }
        else
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'unidade/index']);
        }
    }

    public function edit($id)
    {
        try
        {
            $unidade = Unidade::find([$id]);

            if($unidade != null)
            {
                $this->RenderView('unidade', 'edit', ['unidade' => $unidade]);
            }
            else
            {
                $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'unidade/index']);
            }
        }
        catch (RecordNotFound $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'unidade/index']);
        }
    }

    public function update($id)
    {

    }

    public function delete($id)
    {
    }

}