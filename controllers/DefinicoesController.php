<?php

class DefinicoesController extends BaseAuthController
{
    public function index()
    {
        $this->loginFilter();
        $this->RenderView('definicoes', 'index');
    }

    public function updateEmail()
    {
        $this->loginFilter();

        try
        {
            $current_user = User::find_by_email($_SESSION['email']);
            $current_user->update_attribute('email', $_POST['new_email']);

            if($current_user->is_valid())
            {
                $current_user->save();
                $_SESSION['email'] = $current_user->email; // Atualizar o email na SESSION
                $this->RedirectToRoute('definicoes', 'index',['status' => 0]);
            }
            else
            {
                $this->RedirectToRoute('errors', 'index', ['callbackRoute' => 'definicoes/index']);
            }
        }
        catch(Exception $_)
        {
            $this->RedirectToRoute('errors', 'index', ['callbackRoute' => 'definicoes/index']);
        }
    }

    public function updatePassword()
    {
        $this->loginFilter();

        try
        {
            $auth = new Auth();
            /**
             * É a melhor opção para verificar se o utilizador deu a password correta?
             * Não. Mas também não tem nada a perder porque a sessão já está iniciada.
             * Status Codes:
             *  0 - Sucesso
             *  1 - Antiga password errada
             *  2 - Novas passwords não coincidem
             */
            if($auth->checkLogin($_SESSION['email'], $_POST['old_password']))
            {
                if($_POST['new_password'] == $_POST['re_new_password'])
                {
                    $current_user = User::find_by_email($_SESSION['email']);
                    $current_user->update_attribute('password', password_hash($_POST['new_password'], PASSWORD_BCRYPT));

                    if($current_user->is_valid())
                    {
                        $current_user->save();
                        $this->RedirectToRoute('definicoes', 'index',['status' => 0]);
                    }
                    else
                    {
                        $this->RedirectToRoute('error', 'index',['callbackRoute' => 'definicoes/index']);
                    }
                }
                else
                {
                    $this->RedirectToRoute('definicoes', 'index',['status' => 2]);
                }
            }
            else
            {
                $this->RedirectToRoute('definicoes', 'index',['status' => 1]);
            }
        }
        catch(Exception $_)
        {
            $this->RedirectToRoute('errors', 'index', ['callbackRoute' => 'definicoes/index']);
        }
    }
}