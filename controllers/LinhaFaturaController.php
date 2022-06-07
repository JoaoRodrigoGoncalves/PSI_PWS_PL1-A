<?php

class LinhaFaturaController extends BaseAuthController{

    public function create($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        $fatura = Fatura::find($id);
        $taxas_iva = Taxa::all(array('conditions' => array('emVigor = 1')));
        $produto = isset($_GET['idProduto']) ? Produto::find($_GET['idProduto']) : new Produto();

        //mostrar a vista create
        $this->renderView('linhafatura', 'create', ['fatura' => $fatura, 'taxas_iva' => $taxas_iva, 'produto' => $produto]);
    }

    public function selectProduto($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);
        $produtos = Produto::find_all_by_ativo(1);

        $this->RenderView('linhafatura', 'selectProduto', ['produtos' => $produtos, 'id' => $id]);
    }

    public function store($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        if(!isset($_POST['idProduto'], $_POST['valor'], $_POST['quantidade'], $_POST['taxa_id']))
            $this->RedirectToRoute('linhafatura', 'create',['id' => $id, 'idProduto' => $_POST['idProduto']]);

        //Creação
        $linhaFatura = new LinhaFatura(array(
            'valor' => $_POST['valor'],
            'quantidade' => $_POST['quantidade'],
            'produto_id' => $_POST['idProduto'],
            'taxa_id' => $_POST['taxa_id'],
            'fatura_id' => $id
        ));
        $produto = Produto::find($_POST['idProduto']);
        //Validação de quantidade
        if($produto->stock < $linhaFatura->quantidade)
            $this->renderView('linhafatura', 'create', ['linhaFatura' => $linhaFatura]);

        $produto->update_attributes(array(
            'stock' => $produto->stock - $linhaFatura->quantidade));
        //Validation
        if($linhaFatura->is_valid()){
            $linhaFatura->save();
            $this->RedirectToRoute('fatura', 'show', ['id' => $id]);
            //redirecionar para o fatura show
        } 
        else {
            $this->renderView('linhafatura', 'create', ['linhaFatura' => $linhaFatura]);
            //mostrar vista create passando o modelo como parâmetro
        }
    }

    public function edit($id){
        $this->filterByRole(['funcionario', 'administrador']);

        $linhafatura = LinhaFatura::find($id);
        $taxas = Taxa::all(array('conditions' => array('emVigor = 1')));

        $this->RenderView('linhafatura','edit', ['linhafatura' => $linhafatura, 'taxas' => $taxas]);
    }

    public function update($id){
        $this->filterByRole(['funcionario', 'administrador']);

        if(!isset($_POST['quantidade'], $_POST['taxa_id']))
            $this->RedirectToRoute('linhafatura', 'create',['id' => $id, 'idProduto' => $_POST['idProduto']]);

        try
        {
            $linhaFatura = LinhaFatura::find($id);

            $produto = Produto::find($linhaFatura->produto->id);

            if($linhaFatura->produto->stock < 0)
            {
                // Se o stock total for menor que 0
                $this->RedirectToRoute('fatura', 'show', ['id' => $linhaFatura->fatura->id]);
            }
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
                'taxa_id' => $_POST['taxa_id'],
            ));
            $linhaFatura->save();
            $produto->save();
            $this->RedirectToRoute('fatura','show',['id' => $linhaFatura->fatura->id]);
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'fatura/index']);
        }
    }

    public function delete($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        // TODO: Validar se o item existe

        $linhafatura = LinhaFatura::find($id);
        $produto = Produto::find($linhafatura->produto->id);

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