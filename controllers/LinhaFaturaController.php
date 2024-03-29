<?php

require_once 'models/LinhaFatura.php';

class LinhaFaturaController extends BaseAuthController{

    public function create($idFatura)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        try
        {
            $fatura = Fatura::find($idFatura);
            $taxas_iva = Taxa::all(array('conditions' => array('emVigor = 1')));
            $produto = isset($_GET['idProduto']) ? Produto::find($_GET['idProduto']) : new Produto();

            $this->renderView('linhafatura', 'create', ['fatura' => $fatura, 'taxas_iva' => $taxas_iva, 'produto' => $produto, 'linhaFatura' => new LinhaFatura()]); //mostrar a vista create
        }
        catch(Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'fatura/index']);
        }
    }

    public function store($idFatura)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        try
        {
            if(!isset($_POST['idProduto'], $_POST['quantidade'], $_POST['taxa_id']) || !is_numeric($_POST['quantidade']))
                $this->RenderView('linhafatura', 'create',
                    [
                        'fatura' => Fatura::find($idFatura),
                        'linhaFatura' => new LinhaFatura(),
                        'produto' => Produto::find($_POST['idProduto']),
                        'taxas_iva' => Taxa::all(array('conditions' => array('emVigor = 1')))
                    ]
                );


            if($_POST['quantidade'] <= 0)
            {
                $this->RedirectToRoute('fatura', 'show', ['id' => $idFatura]);
                return;
            }

            $produto = Produto::find($_POST['idProduto']);

            // Verificar se o produto que adicionamos já existe
            if(LinhaFatura::count(array('conditions' => array('fatura_id=? and produto_id=?', $idFatura, $_POST['idProduto']))) == 0)
            {
                $linhaFatura = new LinhaFatura(array(
                    'valor'         => $produto->preco_unitario,
                    'quantidade'    => $_POST['quantidade'],
                    'produto_id'    => $_POST['idProduto'],
                    'taxa_id'       => $_POST['taxa_id'],
                    'fatura_id'     => $idFatura
                ));

                //Validação de quantidade
                if($produto->stock < $linhaFatura->quantidade)
                {
                    $linhaFatura->is_valid(); // Inicializar objecto de erros.
                    $linhaFatura->errors->add('quantidade', 'Stock insuficiente');

                    $linhaFatura->quantidade = $produto->stock;

                    $this->renderView('linhafatura', 'create',
                        [
                            'fatura' => $linhaFatura->fatura,
                            'linhaFatura' => $linhaFatura,
                            'produto' => $produto,
                            'taxas_iva' => Taxa::all(array('conditions' => array('emVigor = 1')))
                        ]
                    ); // Stock insuficiente
                }
                else
                {
                    $produto->update_attributes(array('stock' => ($produto->stock - $linhaFatura->quantidade)));

                    if($linhaFatura->is_valid()){
                        $linhaFatura->save();

                        //redirecionar para o fatura show
                        $this->RedirectToRoute('fatura', 'show', ['id' => $idFatura, 'success' => 1]);
                    }
                    else
                    {
                        //mostrar vista create passando o modelo como parâmetro
                        $this->renderView('linhafatura', 'create',
                            [
                                'fatura' => $linhaFatura->fatura,
                                'linhaFatura' => $linhaFatura,
                                'produto' => $produto,
                                'taxas_iva' => Taxa::all(array('conditions' => array('emVigor = 1')))
                            ]
                        );
                    }
                }
            }
            else
            {
                $linhaFatura = LinhaFatura::first(array('conditions' => array('fatura_id=? and produto_id=?', $idFatura, $_POST['idProduto'])));

                if($produto->stock < $_POST['quantidade'])
                {
                    $linhaFatura->is_valid(); // Inicializar objecto erros

                    $linhaFatura->errors->add('quantidade', 'Stock insuficiente');
                    $linhaFatura->quantidade = $produto->stock;

                    $this->renderView('linhafatura', 'create',
                        [
                            'fatura' => $linhaFatura->fatura,
                            'linhaFatura' => $linhaFatura,
                            'produto' => $produto,
                            'taxas_iva' => Taxa::all(array('conditions' => array('emVigor = 1')))
                        ]
                    );
                }
                else
                {
                    $linhaFatura->update_attribute('quantidade', ($linhaFatura->quantidade + $_POST['quantidade']));
                    $produto->update_attribute('stock', ($produto->stock - $_POST['quantidade']));
                    $this->RedirectToRoute('fatura', 'show', ['id' => $idFatura, 'success' => 1]);
                }
            }
        }
        catch(Exception $_)
        {
            $this->RedirectToRoute('error', 'index');
        }
    }

    public function edit($idLinha){
        $this->filterByRole(['funcionario', 'administrador']);

        try
        {
            $linhafatura = LinhaFatura::find($idLinha);
            $taxas = Taxa::all(array('conditions' => array('emVigor = 1')));

            $produto = isset($_GET['idProduto']) ? Produto::find($_GET['idProduto']) : new Produto();

            $this->RenderView('linhafatura','edit', ['linhafatura' => $linhafatura, 'taxas' => $taxas, 'produto' => $produto]);
        }
        catch(Exception $_)
        {
            $this->RedirectToRoute('error','index', ['callbackRoute' => 'fatura/index']);
        }
    }

    public function update($idLinha){
        $this->filterByRole(['funcionario', 'administrador']);

        try
        {
            if(!isset($_POST['idProduto'], $_POST['quantidade'], $_POST['taxa_id']) || !is_numeric($_POST['quantidade']))
                $this->RedirectToRoute('linhafatura', 'edit',['idLinha' => $idLinha, 'idProduto' => $_POST['idProduto']]);

            if($_POST['quantidade'] > 0)
            {
                $linhaFatura = LinhaFatura::find($idLinha);

                // Verificar alterações de produto e quantidade. Ajustar stock. Funciona como validação custumizada.
                if($linhaFatura->atualizarStock_linhaFatura_update($_POST['idProduto'], $_POST['quantidade']))
                {
                    // Atualizar atributos da linha
                    $linhaFatura->update_attributes(array(
                        'quantidade' => $_POST['quantidade'],
                        'produto_id' => $_POST['idProduto'],
                        'taxa_id' => $_POST['taxa_id'],
                    ));

                    $linhaFatura->save();
                    $this->RedirectToRoute('fatura','show',['id' => $linhaFatura->fatura->id, 'success' => 1]);
                }
                else
                {
                    $this->RenderView('linhafatura', 'edit',
                        [
                            'linhafatura' => $linhaFatura,
                            'taxas' => Taxa::all(array('conditions' => array('emVigor = 1'))),
                            'produto' => new Produto()
                        ]
                    );
                }
            }
            else
            {
                $this->RedirectToRoute('linhafatura', 'delete', ['idLinha' => $idLinha]);
            }
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
                $this->RedirectToRoute('fatura', 'show', ['id' => $linhafatura->fatura->id, 'success' => 1]);
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