<?php

class LinhaFaturaController extends BaseAuthController{

    public function create($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);
        $fatura = Fatura::find([$id]);
        $taxas_iva = Taxa::all(array('conditions' => array('emVigor = 1')));
        $this->renderView('linhafatura', 'create', ['fatura' => $fatura, 'taxas_iva' => $taxas_iva]);//mostrar a vista create
    }
    
    public function store($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        $linhaFatura = new Fatura($_POST);
        $linhaFatura->fatura->id = $id;
        if($linhaFatura->is_valid()){
            $linhaFatura->save();
            $this->RedirectToRoute('fatura', 'show', ['id' => $linhaFatura->fatura->id]);
            //redirecionar para o fatura show
        } 
        else {
            $this->renderView('linhafatura', 'create', ['linhaFatura' => $linhaFatura]);
            //mostrar vista create passando o modelo como parâmetro
        }
    }

    public function edit(){

    }

    public function update(){

    }

    public function delete($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        // TODO: Validar se o item existe

        $linhafatura = LinhaFatura::find([$id]);
        $produto = Produto::find([$linhafatura->produto->id]);

        $produto->update_attributes(array(
            'stock' => $produto->stock + $linhafatura->quantidade
        ));

        if($produto->is_valid()){
            //Update data
            $produto->save();
            $linhafatura->delete();
            //Redirect to show fatura
            $this->RedirectToRoute('fatura', 'show', ['id' => $linhafatura->fatura->id]);
        }
        else
        {
            $taxas_iva = Taxa::all(array('conditions' => array('emVigor = 1')));
            $this->renderView('linhafatura', 'edit', ['linhafatura' => $linhafatura, 'taxas_iva' => $taxas_iva]);
            //mostrar vista edit passando o modelo como parâmetro
        }
    }
}