<?php

use ActiveRecord\RecordNotFound;

class ProdutoController extends BaseAuthController
{
    public function index()
    {
        $this->filterByRole(['funcionario', 'administrador']);

        $products = Produto::all();

        $registerFalg = true;
        if(Taxa::count(array('conditions' => array('emVigor = 1'))) == 0 || Unidade::count() == 0)
            $registerFalg = false;

        $this->RenderView('produto', 'index', ['produtos' => $products, 'allowRegister' => $registerFalg]);
    }

    public function show($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        try
        {
            $produto = Produto::find([$id]);
            $this->RenderView('produto', 'show', ['produto' => $produto]);
        }
        catch(Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'produto/index']);
        }
    }

    public function create()
    {
        $this->filterByRole(['funcionario', 'administrador']);

        $taxas_iva = Taxa::all(array('conditions' => array('emVigor = 1')));
        $unidades = Unidade::all();

        // Verificar se existem taxas ou unidades registadas
        if(count($taxas_iva) == 0 || count($unidades) == 0)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'produto/index']);
        }
        else
        {
            $this->RenderView('produto', 'create', ['taxas_iva' => $taxas_iva, 'unidades' => $unidades]);
        }
    }

    public function store()
    {
        $this->filterByRole(['funcionario', 'administrador']);

        if(isset($_POST['descricao'], $_POST['preco_unitario'], $_POST['stock']))
        {
            $_POST['ativo'] = ($_POST['ativo'] ? 1 : 0);
            $_POST['preco_unitario'] = str_replace(',', '.', $_POST['preco_unitario']);
            $_POST['stock'] = str_replace(',', '.', $_POST['stock']);

            $produto = Produto::create($_POST);

            if($produto->is_valid())
            {
                $this->RedirectToRoute('produto', 'index');
            }
            else
            {
                $this->RenderView('produto', 'create', ['produto' => $produto]);
            }
        }
        else
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'produto/index']);
        }
    }

    public function edit($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        try
        {
            $produto = Produto::find([$id]);
            if($produto != null)
            {
                $taxas_iva = Taxa::all();
                $unidades = Unidade::all();
                $this->RenderView('produto', 'edit', ['produto' => $produto, 'taxas_iva' => $taxas_iva, 'unidades' => $unidades]);
            }
            else
            {
                $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'produto/index']);
            }
        }catch (Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'produto/index']);
        }
    }

    public function update($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        try
        {
            if(isset($_POST['descricao'], $_POST['preco_unitario'], $_POST['stock']))
            {
                $_POST['ativo'] = ($_POST['ativo'] ? 1 : 0);
                $_POST['preco_unitario'] = str_replace(',', '.', $_POST['preco_unitario']);
                $_POST['stock'] = str_replace(',', '.', $_POST['stock']);

                $produto = Produto::find($id);
                $produto->update_attributes($_POST);

                if($produto->is_valid())
                {
                    $produto->save();
                    $this->RedirectToRoute('produto', 'index');
                }
                else
                {
                    $this->RenderView('produto', 'create', ['produto' => $produto]);
                }
            }
            else
            {
                $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'produto/index']);
            }
        }catch (Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'produto/index']);
        }
    }

    public function delete($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        try{
            $produto = Produto::find([$id]);
            if($produto->delete())
            {
                $this->RedirectToRoute('produto', 'index');
            }
            else
            {
                $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'produto/index']);
            }
        }
        catch(Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'produto/index']);
        }
    }

}