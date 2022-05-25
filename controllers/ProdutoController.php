<?php

class ProdutoController extends BaseAuthController
{
    public function index()
    {
        $this->loginFilter();

        $products = Produto::all();
        $this->RenderView('produto', 'index', ['produtos' => $products]);
    }

    public function create()
    {
        $this->loginFilter();
        $this->RenderView('produto', 'edit');
    }

    public function store()
    {

    }

    public function edit($id)
    {
    }

    public function update($id)
    {
    }

    public function delete($id)
    {
    }

}