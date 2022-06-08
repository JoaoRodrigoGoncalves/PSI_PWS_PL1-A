<?php

class FuncionarioController extends BaseAuthController{
    public function index()
    {
        $this->filterByRole(['administrador']);
        $funcionarios = User::find_all_by_role('funcionario');
        $this->RenderView('funcionario', 'index', ['funcionarios' => $funcionarios]);
    }

    public function show($id)
    {
        $this->filterByRole(['administrador']);
        try
        {
            $funcionario = User::find($id);
            $this->RenderView('funcionario', 'show', ['funcionario' => $funcionario]);
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'funcionario/index']);
        }
    }

    public function create()
    {
        $this->filterByRole(['administrador']);
        $this->renderView('funcionario', 'create');//mostrar a vista create
    }
    
    public function store()
    {
        $this->filterByRole(['administrador']);
        if(isset($_POST['username'], $_POST['func_email'], $_POST['func_telefone'], $_POST['func_NIF'],
            $_POST['func_morada'], $_POST['func_codigoPostal'], $_POST['func_localidade'])) {

            $randomPassword = bin2hex(random_bytes(10));

            $funcionario = new User(array(
                'username' => $_POST['username'],
                'password' => password_hash($randomPassword, PASSWORD_BCRYPT),
                'email' => $_POST['func_email'],
                'telefone' => $_POST['func_telefone'],
                'nif' => $_POST['func_NIF'],
                'morada' => $_POST['func_morada'],
                'codigopostal' => $_POST['func_codigoPostal'],
                'localidade' => $_POST['func_localidade'],
                'role' => 'funcionario'
            ));


            if ($funcionario->is_valid()) {

                $empresa = Empresa::first();
                $body = "Bem-vindo ao Fatura+!<br>";
                $body .= "O administrador da empresa <b>" . $empresa->designacaosocial . "</b> adicionou-o ao sistema de faturação Fatura+. Para começar a utilizar a aplicação, utilize o seu e-mail e a password: " . $randomPassword . "<br>";
                $body .= "Cumprimentos,<br>A equipa Fatura+";

                if(EmailSystem::sendEmail($funcionario->email, $funcionario->username, 'Bem-vindo ao Fatura+', $body))
                {
                    $funcionario->save();
                    $this->RedirectToRoute('funcionario', 'index');
                }
                else
                {
                    $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'funcionario/index']);
                }
            } else {
                // Mostrar erros
                $this->RenderView('funcionario', 'create', ['funcionario' => $funcionario]);
            }
        }else{
            $this->RenderView('funcionario', 'create');
        }
    }

    public function edit($id)
    {
        $this->filterByRole(['administrador']);
        try
        {
            $funcionario = User::find($id);
            $this->RenderView('funcionario', 'edit', ['funcionario' => $funcionario]);
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'funcionario/index']);
        }
    }

    public function update($id)
    {
        $this->filterByRole(['administrador']);
        try
        {
            if(!isset($_POST['username'], $_POST['email'], $_POST['telefone'], $_POST['nif'], $_POST['morada'], $_POST['codigopostal'], $_POST['localidade']))
            {
                $this->RedirectToRoute('error', 'index', ['callbaclRoute' => 'funcionario/index']);
            }
            else
            {
                $_POST['ativo'] = ($_POST['ativo'] ? 1 : 0);

                $funcionario = User::find($id);
                $funcionario->update_attributes($_POST);

                if($funcionario->is_valid())
                {
                    $funcionario->save();
                    $this->RedirectToRoute('funcionario', 'index', ['success' => 1]); //redirecionar para o index
                }
                else
                {
                    //mostrar vista edit passando o modelo como parâmetro
                    $this->renderView('funcionario', 'edit', ['funcionario' => $funcionario]);
                }
            }
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'funcionario/index']);
        }
    }

    public function delete($id)
    {
        $this->filterByRole(['administrador']);

        try
        {
            $funcionario = User::find($id);

            if(Fatura::count(array('conditions' => array('funcionario_id=?', $id))) == 0)
            {
                // Remover funcionário visto que nunca fez nenhuma operação
                if($funcionario->delete())
                {
                    $this->RedirectToRoute('funcionario', 'index', ['success' => 0]);
                }
                else
                {
                    $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'funcionario/index']);
                }
            }
            else
            {
                $funcionario->update_attribute('ativo', 0);
                $funcionario->save();
                $this->RedirectToRoute('funcionario', 'index', ['success' => 1]);
            }
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'funcionario/index']);
        }
    }

    public function passwordReset($id)
    {
        // TODO: Mudar função para sitio certo e deixar de duplicar código com ClienteController.php
        $this->filterByRole(['administrador']);

        try
        {
            $funcionario = User::find($id);

            $newPassword = bin2hex(random_bytes(10));

            $funcionario->update_attribute('password', $newPassword);

            if($funcionario->is_valid())
            {
                $body = "Olá " . $funcionario->username . "!<br>";
                $body .= "Foi realizado um pedido de alteração da tua palavra-pase na plataforma Fatura+ pelo administrador.<br>";
                $body .= "Sendo assim, a tua nova palavra-passe para entrar no Fatura+ é: " . $newPassword . '<br>';
                $body .= "Cumprimentos,<br>A Equipa da Fatura+";

                $email = new EmailSystem();

                if($email->sendEmail($funcionario->email, $funcionario->username, "A tua palavra-passe foi alterada", $body))
                {
                    $funcionario->save();
                    $this->RedirectToRoute('funcionario', 'index');
                }
                else
                {
                    $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'funcionario/index']);
                }
            }
            else
            {
                $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'funcionario/index']);
            }
        }
        catch(Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'funcionario/index']);
        }
    }
}