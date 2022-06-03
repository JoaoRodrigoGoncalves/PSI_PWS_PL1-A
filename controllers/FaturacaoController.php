<?php

class FaturacaoController extends BaseAuthController{
    public function index()
    {
        $this->filterByRole(['funcionario', 'administrador']);
        $faturas = Fatura::all();
        $this->RenderView('fatura', 'index', ['faturas' => $faturas]);
    }

    public function show($id)
    {
        $this->filterByRole(['administrador']);
        try
        {
            $fatura = Fatura::find([$id]);
            //TODO Dinamizar para varias empresas
            $empresa = Empresa::find([1]);
            $this->RenderView('fatura', 'show', ['fatura' => $fatura, 'empresa' => $empresa]);
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('fatura','index');
            //$this->RedirectToRoute('error', 'index', ['callbackRoute' => 'fatura/index']);
        }
    }
    
    public function create()
    {
        $this->filterByRole(['funcionario', 'administrador']);
        //
        $this->renderView('fatura', 'create');//mostrar a vista create
    }
    
    public function store()
    {
        $this->filterByRole(['funcionario', 'administrador']);

        $fatura = new Fatura($_POST);
        if($fatura->is_valid()){
            $fatura->save();
            $this->RedirectToRoute('fatura', 'index');//redirecionar para o index
        } 
        else {
            $this->renderView('fatura', 'create', ['fatura' => $fatura]);
            //mostrar vista create passando o modelo como parâmetro
        }
    }

    public function delete($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);
        //Get the data
        $fatura = Fatura::find([$id]);
        $estado = Estado::find([3]);
        try{
            //TODO Check with activeRecords doesn't update it
            var_dump($fatura);
            exit;
            $fatura->update_attributes(array(
                'estado' => $estado
            ));
            $fatura->save();
        }catch (Exception $_ex){

        }
        //redirecionar para o index
        $this->RedirectToRoute('fatura', 'index');
    }
}