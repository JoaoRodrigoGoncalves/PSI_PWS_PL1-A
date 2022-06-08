<?php

class LinhaFaturaController extends BaseAuthController{

    public function create($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        $fatura = Fatura::find($id);
        $taxas_iva = Taxa::all(array('conditions' => array('emVigor = 1')));
        $produto = isset($_GET['idProduto']) ? Produto::find($_GET['idProduto']) : new Produto();

        $this->renderView('linhafatura', 'create', ['fatura' => $fatura, 'taxas_iva' => $taxas_iva, 'produto' => $produto]);
        //mostrar a vista create
    }

    public function selectProduto($id, $destiny){

        $this->filterByRole(['funcionario', 'administrador']);

        $produtos = Produto::find_all_by_ativo(1);

        $this->RenderView('linhafatura', 'selectProduto', ['produtos' => $produtos, 'id' => $id, 'destiny' => $destiny]);
    }

    public function store($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        if(!isset($_POST['idProduto'], $_POST['quantidade'], $_POST['taxa_id']) && !is_numeric($_POST['quantidade']))
            $this->RedirectToRoute('linhafatura', 'create',['id' => $id, 'idProduto' => $_POST['idProduto']]);

        try
        {
            $produto = Produto::find($_POST['idProduto']);

            // Verificar que o produto que adicionamos não existe já
            if(LinhaFatura::count(array('conditions' => array('fatura_id=? and produto_id=?', $id, $_POST['idProduto']))) == 0)
            {
                $linhaFatura = new LinhaFatura(array(
                    'valor' => $produto->preco_unitario,
                    'quantidade' => $_POST['quantidade'],
                    'produto_id' => $_POST['idProduto'],
                    'taxa_id' => $_POST['taxa_id'],
                    'fatura_id' => $id
                ));
            }
            else
            {
                $linhaFatura = LinhaFatura::first(array('conditions' => array('fatura_id=? and produto_id=?', $id, $_POST['idProduto'])));
                $linhaFatura->update_attributes(array('quantidade' => ($linhaFatura->quantidade + $_POST['quantidade'])));
            }

            //Validação de quantidade
            if($produto->stock < $linhaFatura->quantidade)
                $this->renderView('linhafatura', 'create', ['linhaFatura' => $linhaFatura]);

            $produto->update_attributes(array('stock' => $produto->stock - $linhaFatura->quantidade));

            if($linhaFatura->is_valid()){
                $linhaFatura->save();

                //redirecionar para o fatura show
                $this->RedirectToRoute('fatura', 'show', ['id' => $id]);
            }
            else
            {
                //mostrar vista create passando o modelo como parâmetro
                $this->renderView('linhafatura', 'create', ['linhaFatura' => $linhaFatura]);
            }
        }
        catch(Exception $_)
        {

        }
    }

    public function edit($id){
        $this->filterByRole(['funcionario', 'administrador']);

        $linhafatura = LinhaFatura::find($id);
        $taxas = Taxa::all(array('conditions' => array('emVigor = 1')));
        $produto = isset($_GET['idProduto']) ? Produto::find([$_GET['idProduto']]) : new Produto();
        $this->RenderView('linhafatura','edit', ['linhafatura' => $linhafatura, 'taxas' => $taxas, 'produto' => $produto]);
    }

    public function update($id){
        $this->filterByRole(['funcionario', 'administrador']);

        if(!isset($_POST['idProduto'], $_POST['valor'], $_POST['quantidade'], $_POST['taxa_id']))
            $this->RedirectToRoute('linhafatura', 'create',['id' => $id, 'idProduto' => $_POST['idProduto']]);

        $linhaFatura = LinhaFatura::find($id);

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
            'valor' => $_POST['valor'],
            'quantidade' => $_POST['quantidade'],
            'produto_id' => $_POST['idProduto'],
            'taxa_id' => $_POST['taxa_id'],
        ));
        $linhaFatura->save();
        $produto->save();
        $this->RedirectToRoute('fatura','show',['id' => $linhaFatura->fatura->id]);
    }

    public function delete($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        try
        {
            $linhafatura = LinhaFatura::find($id);
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