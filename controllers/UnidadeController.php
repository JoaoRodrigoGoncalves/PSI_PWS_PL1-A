<?php

use ActiveRecord\RecordNotFound;

class UnidadeController extends BaseAuthController
{
    public function index()
    {
        $this->filterByRole(['funcionario', 'administrador']);
        $unidades = Unidade::all();
        $this->RenderView('unidade', 'index', ['unidades' => $unidades]);
    }

    public function create()
    {
        $this->filterByRole(['funcionario', 'administrador']);
        $this->RenderView('unidade', 'create');
    }

    public function store()
    {
        $this->filterByRole(['funcionario', 'administrador']);
        // TODO: Verificar se todos os dados necessários foram recebidos
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
        $this->filterByRole(['funcionario', 'administrador']);
        try
        {
            $unidade = Unidade::find($id);

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
        $this->filterByRole(['funcionario', 'administrador']);
        
        // TODO: Verificar se todos os dados necessários foram recebidos

        try
        {
            $unidade = Unidade::find($id);

            $unidade->update_attributes($_POST);

            if($unidade->is_valid()){
                $unidade->save();
                $this->RedirectToRoute('unidade', 'index');//redirecionar para o index
            }
            else {
                $this->renderView('unidade', 'update', ['unidade' => $unidade]);
                //mostrar vista edit passando o modelo como parâmetro
            }
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'unidade/index']);
        }
    }

    public function delete($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);
        
        // TODO: Criar lógica de desativação ao invés de remoção

        try
        {
            $unidade = Unidade::find($id);
            $unidade->delete();
            $this->RedirectToRoute('unidade', 'index');//redirecionar para o index
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'unidade/index']);
        }
    }

}