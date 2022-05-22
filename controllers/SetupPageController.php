<?php
require_once './controllers/BaseController.php';

class SetupPageController extends BaseController
{
    public function index()
    {
        /**
         * Confirmar que não existe nenhuma conta criada
         * Mostrar vista para criar conta de administrador e fazer a
         * primeira configuração da aplicação com os dados da empresa
         */
        if(User::count() > 0)
        {
            $this->RedirectToRoute('login', 'index');
        }
        else
        {
            $this->RenderView('setup', 'index');
        }
    }

    public function store()
    {
        $administrador = new User(array(
            'username' => $_POST['username'],
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
            'email' => $_POST['admin_email'],
            'telefone' => $_POST['admin_telefone'],
            'nif' => $_POST['admin_NIF'],
            'morada' => $_POST['admin_morada'],
            'codigopostal' => $_POST['admin_codigoPostal'],
            'localidade' => $_POST['admin_localidade'],
            'role' => 2
        ));

        $empresa = new Empresa(array(
            'designacaosocial' => $_POST['designacaoSocial'],
            'capitalsocial' => $_POST['capitalSocial'],
            'email' => $_POST['company_email'],
            'telefone' => $_POST['company_telefone'],
            'nif' => $_POST['company_NIF'],
            'morada' => $_POST['company_morada'],
            'codigopostal' => $_POST['company_codigoPostal'],
            'localidade' => $_POST['company_localidade']
        ));

        // is_valid: Validação normal|is_valid: Validação Normal|validate: Validação de password
        if($administrador->is_valid() && $empresa->is_valid() && $administrador->validate())
        {
            $administrador->save();
            $empresa->save();
            $this->RedirectToRoute('login', 'index');
        }
        else
        {
            // Mostrar erros
            $this->RenderView('setup', 'index', ['admin' => $administrador, 'empresa' => $empresa]);
        }
    }
}