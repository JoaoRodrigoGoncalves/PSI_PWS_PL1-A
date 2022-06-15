<?php

require_once 'models/Produto.php';

class ProdutoController extends BaseAuthController
{
    public function index()
    {
        $this->filterByRole(['funcionario', 'administrador']);
        $products = Produto::all();
        $products = $this->filter($products);
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
            $produto = Produto::find($id);
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
            $this->RenderView('produto', 'create', ['produto' => new Produto(), 'taxas_iva' => $taxas_iva, 'unidades' => $unidades]);
        }
    }

    public function store()
    {
        $this->filterByRole(['funcionario', 'administrador']);

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

    public function edit($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        try
        {
            $produto = Produto::find($id);
            $taxas_iva = Taxa::all();
            $unidades = Unidade::all();
            $this->RenderView('produto', 'edit', ['produto' => $produto, 'taxas_iva' => $taxas_iva, 'unidades' => $unidades]);
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
                    $this->RenderView('produto', 'edit', ['produto' => $produto, 'taxas_iva' => Taxa::all(array('conditions' => array('emvigor=1'))), 'unidades' => Unidade::all()]);
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
            $produto = Produto::find($id);
            $produto->update_attribute('ativo', 0);
            $produto->save();
            $this->RedirectToRoute('produto', 'index', ['status' => 1]); // OK, mas com aviso de desativação
        }
        catch(Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'produto/index']);
        }
    }
    
    public function select($callbackRoute){

        $this->filterByRole(['funcionario', 'administrador']);
        $products = Produto::find_all_by_ativo(1);
        $products = $this->filter($products);
        //Build url
        $callback = explode('/', $callbackRoute);
        $reloadView = "./router.php?c=produto&a=select" .
            "&callbackID=" . $_GET['callbackID'] . "&callbackRoute=" . $callbackRoute;
        $callbackRoute = "./router.php?c=" . $callback[0] . "&a=" . $callback[1] .
            "&callbackID=" . $_GET['callbackID'] . "&callbackRoute=" . $callbackRoute;
        //Go to view
        $this->RenderView('produto', 'select', ['produtos' => $products, 'reloadView' => $reloadView,'callbackRoute' => $callbackRoute]);
    }

    public function filter($products){
        if(isset($_POST['filter_type'], $_POST['table_search']) && $_POST['table_search'] != ''){
            $products = array_filter($products, function($produto){
                if(!strcmp($_POST['filter_type'], 'descricao') ||
                    !strcmp($_POST['filter_type'], 'preco_unitario') ||
                    !strcmp($_POST['filter_type'], 'stock'))
                {
                    return str_contains(strtoupper($produto->{$_POST['filter_type']}),strtoupper($_POST['table_search']));
                }
                else if(!strcmp($_POST['filter_type'], 'unidade'))
                {
                    return str_contains(strtoupper($produto->{$_POST['filter_type']}->unidade),strtoupper($_POST['table_search']));
                }else if(!strcmp($_POST['filter_type'], 'taxa'))
                {
                    return str_contains(strtoupper($produto->{$_POST['filter_type']}->valor),strtoupper($_POST['table_search']));
                }
                return false;
            });
        }
        return $products;
    }
}