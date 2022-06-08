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
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'fatura/index']);
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

        $funcionario = User::find_by_email($_SESSION['email']);

        $fatura = new Fatura(array(
            'estado_id' => 1,
            'cliente_id' => $_POST['idCliente'],
            'funcionario_id' => $funcionario->id
        ));

        try
        {
            if($fatura->is_valid()){
                $fatura->save();
                $this->RedirectToRoute('linhafatura', 'create', ['id' => $fatura->id]); //redirecionar para o index
            }
            else
            {
                $cliente = isset($_GET['idCliente'])? User::find_by_id_and_role($_GET['idCliente'], 'cliente') : new User();

                $this->RenderView('fatura', 'create', ['cliente' => $cliente, 'fatura' => $fatura]); //mostrar vista create passando o modelo como parâmetro
            }
        }
        catch (Exception $_ex)
        {
            $this->RedirectToRoute('fatura', 'create');
        }
    }

    // Update funciona como "Finalizar"
    public function update($id){
        $this->filterByRole(['funcionario', 'administrador']);

        try{
            $fatura = Fatura::find($id);

            $this_funcionario = User::find_by_email($_SESSION['email']);

            $fatura->update_attributes(array(
                'estado_id' => 2,
                'funcionario_id' => $this_funcionario->id // Atribui o ID do funcionário que finaliza a fatura
            ));
            $fatura->save();

            $emailSystem = new EmailSystem();
            $empresa = Empresa::find(1);

            $body = "Olá <b>" . $fatura->cliente->username . "</b>,<br>";
            $body .= "Obrigado pela tua compra em " . $empresa->designacaosocial . "!<br>";
            $body .= "Podes consultar mais dados da tua compa na area de cliente, iniciando sessão com o teu e-mail e palavra-passe.<br><br>";
            $body .= "Cumprimentos,<br><b>" . $empresa->designacaosocial . "</b>";

            if($emailSystem->sendEmail($fatura->cliente->email, $fatura->cliente->username, "Confirmação de compra em " . $empresa->designacaosocial, $body))
            {
                $this->RedirectToRoute('fatura', 'index');
            }
            else
            {
                $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'fatura/index']);
            }
        }catch (Exception $_ex){
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'fatura/index']);
        }
    }

    // O Delete funciona como Anular
    public function delete($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        try{
            $fatura = Fatura::find($id);

            $fatura->update_attributes(array(
                'estado_id' => 3
            ));
            $fatura->save();
            $this->RedirectToRoute('fatura', 'index');
        }catch (Exception $_ex){
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'fatura/index']);
        }
    }
}