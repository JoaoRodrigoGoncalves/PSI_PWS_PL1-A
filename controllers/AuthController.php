<?php

require_once './controllers/BaseAuthController.php';
include_once './models/Auth.php';

class  AuthController extends BaseAuthController
{

    public function index()
    {
        /**
         * Verificar se existe algum utilizador na base de dados.
         * Isto serve para determinar se é a primeira vez que a aplicação
         * é iniciada. Caso seja a primeira vez que a aplicação esteja a
         * ser iniciada, enviamos o utilizador para a página de configuração
         * de um administrador e empresa. Caso contrário, mostramos a vista
         * de início de sessão.
         */
        if(User::count() > 0)
        {
            $auth = new Auth();
            if(!$auth->isLoggedIn())
            {
                $this->RenderView('login', 'index');
            }
            else
            {
                $this->RedirectToRoute('site', 'index');
            }
        }
        else
        {
            $this->RedirectToRoute('setup', 'index');
        }
    }

    public function login()
    {
        /**
         * Verificamos se o utilizador tem sessão inciada. Caso exista
         * uma sessão, enviamos o utilizador para o dashboard da aplicação,
         * caso contrário verificamos se os dados para início de sessão foram
         * fornecidos e se estão corretos. Se os dados não tiverem sido fornecidos,
         * o utilizador é enviado para a página de início de sessão. Caso os dados
         * fornecidos estejam incorretos, é mostrada a vista de início de sessão
         * com um alert a indicar que as credenciais estão incorretas.
         */
        $auth = new Auth();
        if(!$auth->isLoggedIn())
        {
            if(isset($_POST['email'],$_POST['password']))
            {
                if ($auth->checkLogin($_POST['email'], $_POST['password'])){
                    $this->RedirectToRoute('dashboard','index');
                }
                else
                    $this->RenderView('login', 'index', ['fail' => true]);
            }else{
                $this->RenderView('login', 'index', ['fail' => true]);
            }
        }
        else
        {
            $this->RedirectToRoute('dashboard', 'index');
        }
    }

    public function logOut()
    {
        $this->loginFilter();
        $auth = new Auth();
        $auth->logOut();
        $this->RedirectToRoute('login','index');
    }

    //TODO: Mover resetPassword para aqui
}
