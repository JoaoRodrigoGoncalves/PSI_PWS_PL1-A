<?php

class FaturaController extends BaseAuthController{
    public function index()
    {
        $this->filterByRole(['funcionario', 'administrador']);
        $faturas = Fatura::all();
        $this->RenderView('fatura', 'index', ['faturas' => $faturas]);
    }

    public function show($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);
        try
        {
            $fatura = Fatura::find($id);
            $empresa = Empresa::find(1);

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

        $cliente = isset($_GET['idCliente'])? User::find_by_id_and_role($_GET['idCliente'], 'cliente') : new User();

        $this->RenderView('fatura', 'create', ['cliente' => $cliente]); //mostrar a vista create
    }

    public function selectCliente(){
        $this->filterByRole(['funcionario', 'administrador']);

        $clientes = User::find_all_by_role('cliente');

        $this->RenderView('fatura', 'selectCliente', ['clientes' => $clientes]);
    }

    public function store()
    {
        $this->filterByRole(['funcionario', 'administrador']);

        if(!isset($_POST['idCliente']))
            $this->RedirectToRoute('fatura', 'create');

        try{

            $this_funcionario = User::find_by_email($_SESSION['email']);

            //Inicializar fatura base com estado, cliente e funcionário
            $fatura = new Fatura(array(
                'estado_id' => 1,
                'cliente_id' => $_POST['idCliente'],
                'funcionario_id' => $this_funcionario->id
            ));

            if($fatura->is_valid()){
                $fatura->save();
                $this->RedirectToRoute('linhafatura', 'create', ['id' => $fatura->id]); //redirecionar para o index
            }
            else
            {
                $cliente = isset($_GET['idCliente']) ? User::find_by_id_and_role($_GET['idCliente'], 'cliente') : new User();

                //mostrar vista create passando o modelo como parâmetro
                $this->RenderView('fatura', 'create', ['cliente' => $cliente]);
            }
        }catch (Exception $_ex){
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'fatura/create']);
        }
    }

    /**
     * A função de update() funciona como finalizar
     */
    public function update($id){
        $this->filterByRole(['funcionario', 'administrador']);

        $fatura = Fatura::find($id);

        try{

            $fatura->update_attributes(array(
                'estado_id' => 2
            ));
            $fatura->save();

            $this->RedirectToRoute('fatura', 'index');
        }catch (Exception $_ex){
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'fatura/create']);
        }
    }

    /**
     * A função delete() funciona como Anular
     */
    public function delete($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        $fatura = Fatura::find($id);

        try{
            $fatura->update_attributes(array(
                'estado_id' => 3
            ));
            $fatura->save();

            $this->RedirectToRoute('fatura', 'index');
        }catch (Exception $_ex){
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => '']);
        }
    }
}