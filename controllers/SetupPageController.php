<?php
require_once './controllers/BaseController.php';

class SetupPageController extends BaseController
{
    public function index()
    {
        // Confirmar que não existe nenhuma conta criada
        // Mostrar vista para criar conta de administrador e fazer a
        // primeira configuração da aplicação com os dados da empresa
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
        if($_POST['password'] == $_POST['re_password'])
        {
            $administrador = new User(array(
                'username' => $_POST['username'],
                'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
                'email' => $_POST['admin_email'],
                'telefone' => $_POST['admin_telefone'],
                'nif' => $_POST['admin_nif'],
                'morada' => $_POST['admin_morada'],
                'codigoPostal' => $_POST['admin_codigoPostal'],
                'localidade' => $_POST['admin_localidade'],
                'role' => 2
            ));

            $empresa = new Empresa(array(
                'designacaoSocial' => $_POST['designacaoSocial'],
                'capitalSocial' => $_POST['capitalSocial'],
                'email' => $_POST['company_email'],
                'telefonee' => $_POST['company_telefone'],
                'nif' => $_POST['company_nif'],
                'morada' => $_POST['company_morada'],
                'codigoPostal' => $_POST['company_codigoPostal'],
                'localidade' => $_POST['company_localidade']
            ));

            if($administrador->is_valid() && $empresa->is_valid())
            {
                $administrador->save();
                $this->RedirectToRoute('login', 'index');
            }
            else
            {
                // Mostrar erros
                $this->RenderView('setup', 'index', ['admin' => $administrador, 'empresa' => $empresa]);
            }
        }
        else
        {
            //
        }
    }
}