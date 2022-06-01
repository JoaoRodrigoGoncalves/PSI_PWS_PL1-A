<?php

class FaturacaoController extends BaseAuthController{
    public function index()
    {
        $this->filterByRole(['funcionario', 'administrador']);
        $faturas = Fatura::all();
        $this->RenderView('fatura', 'index', ['faturas' => $faturas]);
    }
    
    public function create()
    {
        $this->filterByRole(['funcionario', 'administrador']);
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

    public function edit($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        // TODO: Validar se o item existe

        $fatura = Fatura::find([$id]);
        if (is_null($fatura)) {
        //TODO redirect to standard error page
        } 
        else {
            $this->renderView('fatura', 'edit', ['fatura' => $fatura]);
            //mostrar a vista edit passando os dados por parâmetro
        }
    }

    public function update($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        // TODO: Verificar se todos os dados necessários foram recebidos
        // TODO: Validar se o item existe

        $faturas = Fatura::find([$id]);

        $faturas->update_attributes($_POST);
        

        if($faturas->is_valid()){
            $faturas->save();
            $this->RedirectToRoute('taxa', 'index');//redirecionar para o index
        } 
        else {
            $this->renderView('fatura', 'update', ['faturas' => $faturas]);
            //mostrar vista edit passando o modelo como parâmetro
        }
    }

    public function delete($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        // TODO: Validar se o item existe

        $faturas = Fatura::find([$id]);
        $faturas->delete();
        $this->RedirectToRoute('fatura', 'index');//redirecionar para o index
    }
}