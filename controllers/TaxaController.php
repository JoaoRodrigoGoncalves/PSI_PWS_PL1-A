<?php

class TaxaController extends BaseAuthController{
    public function index()
    {
        $this->filterByRole(['funcionario', 'administrador']);
        $taxas = Taxa::all();
        $this->RenderView('taxa', 'index', ['taxas' => $taxas]);
    }
    
    public function create()
    {
        $this->filterByRole(['funcionario', 'administrador']);
        $this->renderView('taxa', 'create');//mostrar a vista create
    }
    
    public function store()
    {
        $this->filterByRole(['funcionario', 'administrador']);

        // TODO: Verificar se todos os dados necessários foram recebidos

        if($_POST['emvigor']){
            $_POST['emvigor'] = 1;
        }else{
            $_POST['emvigor'] = 0;
        }
        
        $taxas = new Taxa($_POST);
        if($taxas->is_valid()){
            $taxas->save();
            $this->RedirectToRoute('taxa', 'index');//redirecionar para o index
        } 
        else {
            $this->renderView('taxa', 'create', ['taxas' => $taxas]);
            //mostrar vista create passando o modelo como parâmetro
        }
    }

    public function edit($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        // TODO: Validar se o item existe

        $taxas = Taxa::find([$id]);
        if (is_null($taxas)) {
        //TODO redirect to standard error page
        } 
        else {
            $this->renderView('taxa', 'edit', ['taxas' => $taxas]);
            //mostrar a vista edit passando os dados por parâmetro
        }
    }

    public function update($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        // TODO: Verificar se todos os dados necessários foram recebidos
        // TODO: Validar se o item existe

        $taxas = Taxa::find([$id]);
        
        if(isset($_POST['emvigor'])){
            $_POST['emvigor'] = 1;
        }else{
            $_POST['emvigor'] = 0;
        }
        $taxas->update_attributes($_POST);
        

        if($taxas->is_valid()){
            $taxas->save();
            $this->RedirectToRoute('taxa', 'index');//redirecionar para o index
        } 
        else {
            $this->renderView('taxa', 'update', ['taxas' => $taxas]);
            //mostrar vista edit passando o modelo como parâmetro
        }
    }

    public function delete($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        // TODO: Validar se o item existe

        $taxas = Taxa::find([$id]);
        $taxas->delete();
        $this->RedirectToRoute('taxa', 'index');//redirecionar para o index
    }
}