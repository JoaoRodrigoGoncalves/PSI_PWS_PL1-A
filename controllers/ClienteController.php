<?php

class ClienteController extends BaseAuthController{
    public function index()
    {
        $this->filterByRole(['funcionario', 'administrador']);
        $clientes = User::find_all_by_role('cliente');
        $this->RenderView('cliente', 'index', ['clientes' => $clientes]);
    }

    public function show($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);
        try
        {
            $cliente = User::find([$id]);
            $this->RenderView('cliente', 'show', ['cliente' => $cliente]);
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'cliente/index']);
        }
    }

    public function create()
    {
        $this->loginFilter();
        $this->RenderView('cliente', 'create'); //mostrar a vista create
    }

    public function store()
    {
        try
        {
            $this->filterByRole(['funcionario', 'administrador']);

            if(isset($_POST['username'], $_POST['email'], $_POST['telefone'], $_POST['nif'], $_POST['morada'], $_POST['codigopostal'], $_POST['localidade']))
            {
                $randomPassword = bin2hex(random_bytes(10));

                $cliente = new User(array(
                    'username' => $_POST['username'],
                    'password' => password_hash($randomPassword, PASSWORD_BCRYPT),
                    'email' => $_POST['email'],
                    'telefone' => $_POST['telefone'],
                    'nif' => $_POST['nif'],
                    'morada' => $_POST['morada'],
                    'codigopostal' => $_POST['codigopostal'],
                    'localidade' => $_POST['localidade'],
                    'role' => 'cliente'
                ));

                if($cliente->is_valid()){
                    $body = "Bem-Vindo à plataforma Fatura+<br><br>";
                    $body .= "Para iniciar sessão na aplicação, utilize o seu email e a palavra-passe: " . $randomPassword . "<br><br>";
                    $body .= "Cumprimentos,<br> A equipa Fatura+";

                    $mail = new EmailSystem();
                    if($mail->sendEmail($cliente->email, $cliente->username, 'Bem-vindo ao Fatura+', $body))
                    {
                        $cliente->save();
                        $this->RedirectToRoute('cliente', 'index'); //redirecionar para o index
                    }
                    else
                    {
                        // Ocorreu um erro qualquer ao enviar o email com os dados ao cliente.
                        $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'cliente/index']);
                    }
                }
                else {
                    //mostrar vista create passando o modelo como parâmetro
                    $this->renderView('cliente', 'create', ['clientes' => $cliente]);
                }
            }
            else
            {
                $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'cliente/index']);
            }
        }
        catch(Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'cliente/index']);
        }
    }
    public function edit($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        try
        {
            $cliente = User::find([$id]);
            $this->renderView('cliente', 'edit', ['cliente' => $cliente]);
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'cliente/index']);
        }
    }
    public function update($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        if(isset($_POST['username'], $_POST['email'], $_POST['telefone'], $_POST['nif'], $_POST['morada'], $_POST['codigopostal'], $_POST['localidade']))
        {
            try
            {
                $cliente = User::find([$id]);

                $cliente->update_attributes(array(
                    'username' => $_POST['username'],
                    'email' => $_POST['email'],
                    'telefone' => $_POST['telefone'],
                    'nif' => $_POST['nif'],
                    'morada' => $_POST['morada'],
                    'codigopostal' => $_POST['codigopostal'],
                    'localidade' => $_POST['localidade']
                ));

                if($cliente->is_valid()){
                    $cliente->save();
                    $this->RedirectToRoute('cliente', 'index');//redirecionar para o index
                }
                else {
                    $this->renderView('cliente', 'edit', ['clientes' => $cliente]);
                    //mostrar vista edit passando o modelo como parâmetro
                }
            }
            catch (Exception $_)
            {
                $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'client/index']);
            }
        }
    }
    
    public function delete($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        try
        {
            $cliente = User::find([$id]);

            if($cliente->delete())
            {
                $this->RedirectToRoute('cliente', 'index');//redirecionar para o index
            }
            else
            {
                $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'cliente/index']);
            }
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'cliente/index']);
        }
    }
}