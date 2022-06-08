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
        if(User::count() > 0)
        {
            $this->RedirectToRoute('login', 'index');
        }

        if(isset($_POST['username'], $_POST['password'], $_POST['re_password'], $_POST['admin_email'], $_POST['admin_telefone'], $_POST['admin_NIF'], $_POST['admin_morada'],
            $_POST['admin_codigoPostal'], $_POST['admin_localidade'], $_POST['designacaoSocial'], $_POST['capitalSocial'], $_POST['empresa_email'], $_POST['empresa_telefone'],
            $_POST['empresa_NIF'], $_POST['empresa_morada'], $_POST['empresa_codigoPostal'], $_POST['empresa_localidade'])) {

            $administrador = new User(array(
                'username' => $_POST['username'],
                'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
                'email' => $_POST['admin_email'],
                'telefone' => $_POST['admin_telefone'],
                'nif' => $_POST['admin_NIF'],
                'morada' => $_POST['admin_morada'],
                'codigopostal' => $_POST['admin_codigoPostal'],
                'localidade' => $_POST['admin_localidade'],
                'role' => 'administrador'
            ));

            $empresa = new Empresa(array(
                'designacaosocial' => $_POST['designacaoSocial'],
                'capitalsocial' => $_POST['capitalSocial'],
                'email' => $_POST['empresa_email'],
                'telefone' => $_POST['empresa_telefone'],
                'nif' => $_POST['empresa_NIF'],
                'morada' => $_POST['empresa_morada'],
                'codigopostal' => $_POST['empresa_codigoPostal'],
                'localidade' => $_POST['empresa_localidade']
            ));

            if ($administrador->is_valid() && $empresa->is_valid() && $administrador->validar_password($_POST['password'], $_POST['re_password'])) {
                $administrador->save();
                $empresa->save();
                $this->RedirectToRoute('login', 'index');
            } else {
                // Mostrar erros
                $this->RenderView('setup', 'index', ['admin' => $administrador, 'empresa' => $empresa]);
            }
        }
        else
        {
            // TODO: Resolver o erro do erro
            $this->RenderView('error', 'index', ['callbackRoute', 'setup/index']);
        }
    }
}