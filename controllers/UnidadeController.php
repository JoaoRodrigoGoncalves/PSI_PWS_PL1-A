<?php

use ActiveRecord\RecordNotFound;
require_once 'models/Unidade.php';

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
        $this->RenderView('unidade', 'create', ['unidade' => new Unidade()]);
    }

    public function store()
    {
        $this->filterByRole(['funcionario', 'administrador']);
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
        
        try
        {
            if(!isset($_POST['unidade']))
                throw new Exception('Campos em falta');


            $unidade = Unidade::find($id);
            $unidade->update_attributes($_POST);

            if($unidade->is_valid()){
                $unidade->save();
                $this->RedirectToRoute('unidade', 'index', ['success' => 1]); //redirecionar para o index
            }
            else {
                //mostrar vista edit passando o modelo como parâmetro
                $this->renderView('unidade', 'edit', ['unidade' => $unidade]);
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

        try
        {
            $unidade = Unidade::find($id);

            if(Produto::count(array('conditions' => array('unidade_id=?', $id))) == 0)
            {
                $unidade->delete();
                $this->RedirectToRoute('unidade', 'index', ['success' => 1]); //redirecionar para o index (sucesso)
            }
            else
            {
                $this->RedirectToRoute('unidade', 'index', ['success' => 0]); //redirecionar para o index (erro)
            }
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'unidade/index']);
        }
    }

}