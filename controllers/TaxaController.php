<?php

require_once 'models/Taxa.php';

class TaxaController extends BaseAuthController{
    public function index()
    {
        $this->filterByRole(['funcionario', 'administrador']);
        $taxas = Taxa::all();
        if(isset($_POST['filter_type'], $_POST['table_search']) && $_POST['table_search'] != ''){
            $taxas = array_filter($taxas, function($taxa){
                return str_contains(strtoupper($taxa->{$_POST['filter_type']}),strtoupper($_POST['table_search']));
            });
        }
        $this->RenderView('taxa', 'index', ['taxas' => $taxas]);
    }
    
    public function create()
    {
        $this->filterByRole(['funcionario', 'administrador']);
        $this->renderView('taxa', 'create', ['taxa' => new Taxa()]);//mostrar a vista create
    }
    
    public function store()
    {
        $this->filterByRole(['funcionario', 'administrador']);

        if($_POST['emvigor']){
            $_POST['emvigor'] = 1;
        }else{
            $_POST['emvigor'] = 0;
        }
        
        $taxas = new Taxa($_POST);
        if($taxas->is_valid()){
            $taxas->save();
            $this->RedirectToRoute('taxa', 'index', ['success' => 1]); //redirecionar para o index
        } 
        else {
            //mostrar vista create passando o modelo como parâmetro
            $this->renderView('taxa', 'create', ['taxas' => $taxas]);
        }
    }

    public function edit($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        try
        {
            $taxas = Taxa::find($id);
            if (is_null($taxas)) {
                $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'taxa/index']);
            }
            else {
                //mostrar a vista edit passando os dados por parâmetro
                $this->renderView('taxa', 'edit', ['taxas' => $taxas]);
            }
        }
        catch(Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'taxa/index']);
        }
    }

    public function update($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        try
        {
            $taxas = Taxa::find($id);

            if(isset($_POST['emvigor'])){
                $_POST['emvigor'] = 1;
            }else{
                $_POST['emvigor'] = 0;
            }

            $taxas->update_attributes($_POST);

            if($taxas->is_valid())
            {
                $taxas->save();
                $this->RedirectToRoute('taxa', 'index', ['success' => 1]); //redirecionar para o index
            }
            else {
                //mostrar vista edit passando o modelo como parâmetro
                $this->renderView('taxa', 'edit', ['taxas' => $taxas]);
            }
        }
        catch(Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'taxa/index']);
        }
    }

    public function delete($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        try
        {
            $taxas = Taxa::find($id);
            $taxas->update_attribute('emvigor', 0);
            $taxas->save();
            $this->RedirectToRoute('taxa', 'index', ['success' => 1]); //redirecionar para o index
        }
        catch(Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'taxa/index']);
        }
    }
}