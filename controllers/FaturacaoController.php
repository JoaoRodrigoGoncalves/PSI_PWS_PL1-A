<?php

class FaturacaoController extends BaseAuthController{
    public function index()
    {
        $this->filterByRole(['funcionario', 'administrador']);
        $faturas = Fatura::all();
        $this->RenderView('fatura', 'index', ['faturas' => $faturas]);
    }

    public function show($id)
    {
        $this->filterByRole(['administrador']);
        try
        {
            $fatura = Fatura::find([$id]);
            //TODO Dinamizar para varias empresas
            $empresa = Empresa::find([1]);
            $this->RenderView('fatura', 'show', ['fatura' => $fatura, 'empresa' => $empresa]);
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('fatura','index');
            //$this->RedirectToRoute('error', 'index', ['callbackRoute' => 'fatura/index']);
        }
    }
    
    public function create()
    {
        $this->filterByRole(['funcionario', 'administrador']);
        //
        $cliente = isset($_GET['idCliente'])? User::find_by_id_and_role($_GET['idCliente'], 'cliente') : new User();
        //TODO Selecionar funcionario que tenha feito login
        $funcionario = User::find_by_role('funcionario');
        //
        $this->RenderView('fatura', 'create', ['cliente' => $cliente, 'funcionario' => $funcionario]);
        //mostrar a vista create
    }

    public function selectCliente(){
        $this->filterByRole(['funcionario', 'administrador']);
        $clientes = User::find_all_by_role('cliente');
        $this->RenderView('fatura', 'selectCliente', ['clientes' => $clientes]);
    }

    public function store()
    {
        if(!isset($_POST['idCliente'],$_POST['idFuncionario']))
            $this->RedirectToRoute('fatura', 'create');

        $this->filterByRole(['funcionario', 'administrador']);

        //TODO Construir fatura para emitir na base de dados
        $fatura = new Fatura(array(
            'observacoes' => $_POST['observacoes'],
            'estado_id' => 1,
            'cliente_id' => $_POST['idCliente'],
            'funcionario_id' => $_POST['idFuncionario']
        ));
        //
        try{
            if($fatura->is_valid()){
                $fatura->save();
                $this->RedirectToRoute('linhafatura', 'create', ['id' => $fatura->id]);//redirecionar para o index
            }
            else
            {
                $cliente = isset($_GET['idCliente'])? User::find_by_id_and_role($_GET['idCliente'], 'cliente') : new User();
                //TODO Selecionar funcionario que tenha feito login
                $funcionario = User::find_by_role('funcionario');
                //
                $this->RenderView('fatura', 'create', ['cliente' => $cliente, 'funcionario' => $funcionario, 'fatura' => $fatura]);
                //mostrar vista create passando o modelo como parâmetro
            }
        }catch (Exception $_ex){
            $this->RedirectToRoute('fatura', 'create');
        }
    }

    public function update($id){
        $this->filterByRole(['funcionario', 'administrador']);
        //Get the data
        $fatura = Fatura::find([$id]);
        try{
            $fatura->update_attributes(array(
                'estado_id' => 2
            ));
            $fatura->save();
        }catch (Exception $_ex){

        }
        //redirecionar para o index
        $this->RedirectToRoute('fatura', 'index');
    }

    public function delete($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);
        //Get the data
        $fatura = Fatura::find([$id]);
        try{
            $fatura->update_attributes(array(
                'estado_id' => 3
            ));
            $fatura->save();
        }catch (Exception $_ex){

        }
        //redirecionar para o index
        $this->RedirectToRoute('fatura', 'index');
    }
}