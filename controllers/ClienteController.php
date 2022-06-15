<?php

require_once 'models/User.php';

class ClienteController extends BaseAuthController{
    public function index()
    {
        $this->filterByRole(['funcionario', 'administrador']);
        $clientes = User::find_all_by_role('cliente');
        if(isset($_POST['filter_type'], $_POST['table_search']) && $_POST['table_search'] != ''){
            $clientes = array_filter($clientes, function($client){
                return str_contains(strtoupper($client->{$_POST['filter_type']}),strtoupper($_POST['table_search']));
            });
        }
        $this->RenderView('cliente', 'index', ['clientes' => $clientes]);
    }

    public function show($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);
        try
        {
            $cliente = User::find($id);
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
        $this->RenderView('cliente', 'create', ['cliente' => new User()]); //mostrar a vista create
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

                    $empresa = Empresa::first();

                    $body = "Bem-Vindo/a à plataforma Fatura+ da empresa " . $empresa->designacaosocial . "<br><br>";
                    $body .= "Aqui poderá consultar todas as suas faturas de compras realizadas na empresa " . $empresa->designacaosocial . ".<br>";
                    $body .= "Para iniciar sessão na aplicação, utilize o seu e-mail e a palavra-passe: " . $randomPassword . "<br><br>";
                    $body .= "Cumprimentos,<br> A equipa Fatura+";

                    $mail = new EmailSystem();
                    if($mail->sendEmail($cliente->email, $cliente->username, 'Conta cliente em ' . $empresa->designacaosocial, $body))
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
                    $this->renderView('cliente', 'create', ['cliente' => $cliente]);
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
            $cliente = User::find($id);
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
        
        try
        {
            $_POST['ativo'] = ($_POST['ativo'] ? 1 : 0);
            $cliente = User::find($id);
            $cliente->update_attributes($_POST);
            if($cliente->is_valid())
            {
                $cliente->save();
                $this->RedirectToRoute('cliente', 'index', ['success' => 1]);//redirecionar para o index
            }
            else {
                $this->renderView('cliente', 'edit', ['cliente' => $cliente]);
                //mostrar vista edit passando o modelo como parâmetro
            }
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'client/index']);
        }
    }
    
    
    public function delete($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        try
        {
            $cliente = User::find($id);
            $cliente->update_attribute('ativo', 0);
            $cliente->save();
            $this->RedirectToRoute('cliente', 'index', ['success' => 1]);//redirecionar para o index
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'cliente/index']);
        }
    }

    public function resetPassword($id)
    {
        // TODO: Mudar função para sitio certo e deixar de duplicar código com FuncionarioController.php
        $this->filterByRole(['funcionario', 'administrador']);

        try
        {
            $cliente = User::find($id);

            $newPassword = bin2hex(random_bytes(10));

            $cliente->update_attribute('password', password_hash($newPassword, PASSWORD_BCRYPT));

            if($cliente->is_valid())
            {
                $body = "Olá " . $cliente->username . "!<br>";
                $body .= "Foi realizado um pedido de alteração da tua palavra-pase na plataforma Fatura+ pelo administrador.<br>";
                $body .= "Sendo assim, a tua nova palavra-passe para entrar no Fatura+ é: " . $newPassword . '<br>';
                $body .= "Cumprimentos,<br>A Equipa da Fatura+";

                $email = new EmailSystem();

                if($email->sendEmail($cliente->email, $cliente->username, "A tua palavra-passe foi alterada", $body))
                {
                    $cliente->save();
                    $this->RedirectToRoute('cliente', 'index');
                }
                else
                {
                    $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'cliente/index']);
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
    public function select()
    {
        $this->filterByRole(['funcionario', 'administrador']);
        $clientes = User::find_all_by_role('cliente');
        $this->RenderView('cliente', 'select', ['clientes' => $clientes]);
    }
}