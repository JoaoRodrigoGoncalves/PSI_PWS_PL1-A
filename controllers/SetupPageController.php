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
        //
    }
}