<?php

class LinhaFaturaController extends BaseAuthController{

    public function create($idFatura)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        try
        {
            $fatura = Fatura::find($idFatura);
            $taxas_iva = Taxa::all(array('conditions' => array('emVigor = 1')));
            $produto = isset($_GET['idProduto']) ? Produto::find($_GET['idProduto']) : new Produto();

            $this->renderView('linhafatura', 'create', ['fatura' => $fatura, 'taxas_iva' => $taxas_iva, 'produto' => $produto]); //mostrar a vista create
        }
        catch(Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'fatura/index']);
        }
    }

    public function store($idFatura)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        if(!isset($_POST['idProduto'], $_POST['quantidade'], $_POST['taxa_id']) && !is_numeric($_POST['quantidade']))
            $this->RedirectToRoute('linhafatura', 'create',['id' => $idFatura, 'idProduto' => $_POST['idProduto']]);

        try
        {
            $produto = Produto::find($_POST['idProduto']);

            // Verificar que o produto que adicionamos não existe já
            if(LinhaFatura::count(array('conditions' => array('fatura_id=? and produto_id=?', $idFatura, $_POST['idProduto']))) == 0)
            {
                $linhaFatura = new LinhaFatura(array(
                    'valor' => $produto->preco_unitario,
                    'quantidade' => $_POST['quantidade'],
                    'produto_id' => $_POST['idProduto'],
                    'taxa_id' => $_POST['taxa_id'],
                    'fatura_id' => $idFatura
                ));
            }
            else
            {
                $linhaFatura = LinhaFatura::first(array('conditions' => array('fatura_id=? and produto_id=?', $idFatura, $_POST['idProduto'])));
                $linhaFatura->update_attributes(array('quantidade' => ($linhaFatura->quantidade + $_POST['quantidade'])));
            }

            //Validação de quantidade
            if($produto->stock < $linhaFatura->quantidade)
            {
                $this->renderView('linhafatura', 'create', ['linhaFatura' => $linhaFatura]); // Stock insuficiente
            }
            else
            {
                $produto->update_attributes(array('stock' => $produto->stock - $linhaFatura->quantidade));

                if($linhaFatura->is_valid()){
                    $linhaFatura->save();

                    //redirecionar para o fatura show
                    $this->RedirectToRoute('fatura', 'show', ['id' => $idFatura]);
                }
                else
                {
                    //mostrar vista create passando o modelo como parâmetro
                    $this->renderView('linhafatura', 'create', ['linhaFatura' => $linhaFatura]);
                }
            }
        }
        catch(Exception $_)
        {
            $this->renderView('error', 'index');
        }
    }

    public function edit($idLinha){
        $this->filterByRole(['funcionario', 'administrador']);

        try
        {
            $linhafatura = LinhaFatura::find($idLinha);
            $taxas = Taxa::all(array('conditions' => array('emVigor = 1')));
            $produto = isset($_GET['idProduto']) ? Produto::find([$_GET['idProduto']]) : new Produto();
            $this->RenderView('linhafatura','edit', ['linhafatura' => $linhafatura, 'taxas' => $taxas, 'produto' => $produto]);
        }
        catch(Exception $_)
        {
            $this->RenderView('error','index', ['callbackRoute' => 'fatura/index']);
        }
    }

    public function update($idLinha){
        $this->filterByRole(['funcionario', 'administrador']);

        try
        {
            if(!isset($_POST['idProduto'], $_POST['quantidade'], $_POST['taxa_id']))
                $this->RedirectToRoute('linhafatura', 'create',['id' => $idLinha, 'idProduto' => $_POST['idProduto']]);

            $linhaFatura = LinhaFatura::find($idLinha);
            $produto = Produto::find($_POST['idProduto']);

            if($produto->stock < ($linhaFatura->quantidade - $_POST['quantidade']))
                $this->RedirectToRoute('fatura','show',['id' => $linhaFatura->fatura->id]);
            else if($linhaFatura->quantidade > $_POST['quantidade'])
                $produto->update_attributes(array(
                    'stock' => $produto->stock + ($linhaFatura->quantidade - $_POST['quantidade'])
                ));
            else if($linhaFatura->quantidade < $_POST['quantidade'])
                $produto->update_attributes(array(
                    'stock' => $produto->stock + ($linhaFatura->quantidade - $_POST['quantidade'])
                ));

            $linhaFatura->update_attributes(array(
                'quantidade' => $_POST['quantidade'],
                'produto_id' => $_POST['idProduto'],
                'taxa_id' => $_POST['taxa_id'],
            ));

            $linhaFatura->save();
            $produto->save();
            $this->RedirectToRoute('fatura','show',['id' => $linhaFatura->fatura->id]);
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('error','index',['callbackRoute' => 'fatura/index']);
        }
    }

    public function delete($idLinha)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        try
        {
            $linhafatura = LinhaFatura::find($idLinha);
            $produto = Produto::find($linhafatura->produto->id);

            $produto->update_attributes(array(
                'stock' => $produto->stock + $linhafatura->quantidade
            ));

            if($produto->is_valid()){
                $produto->save();
                $linhafatura->delete();

                //Redirect to show fatura
                $this->RedirectToRoute('fatura', 'show', ['id' => $linhafatura->fatura->id]);
            }
            else
            {
                $taxas_iva = Taxa::all(array('conditions' => array('emVigor = 1')));
                //mostrar vista edit passando o modelo como parâmetro
                $this->renderView('linhafatura', 'edit', ['linhafatura' => $linhafatura, 'taxas_iva' => $taxas_iva]);
            }
        }
        catch (Exception $_)
        {
            $this->renderView('error', 'index');
        }
    }
}