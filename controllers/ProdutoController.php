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

        $taxas_iva = Taxas::all(array('conditions' => array('emVigor = 1')));
        $unidades = Unidade::all();

        $this->RenderView('produto', 'create', ['taxas_iva' => $taxas_iva, 'unidades' => $unidades]);
    }

    public function store()
    {
        $this->loginFilter();

        if(isset($_POST['ativo'], $_POST['descricao'], $_POST['preco_unitario'], $_POST['stock']))
        {
            $_POST['ativo'] = ($_POST['ativo'] ? 1 : 0);

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
    }

    public function update($id)
    {
    }

    public function delete($id)
    {
    }

}