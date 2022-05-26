<?php

class FuncionarioController extends BaseAuthController{
    public function index()
    {
        $this->loginFilter();
        $funcionarios = User::find_all_by_role(1);
        $this->RenderView('funcionario', 'index', ['funcionarios' => $funcionarios]);
    }

    public function show($id)
    {
        $this->loginFilter();
        try
        {
            $funcionario = User::find([$id]);
            $this->RenderView('funcionario', 'show', ['funcionario' => $funcionario]);
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'funcionario/index']);
        }
    }

    public function create()
    {
        $this->renderView('funcionario', 'create');//mostrar a vista create
    }
    
    public function store()
    {
        $this->loginFilter();
        if(isset($_POST['username'], $_POST['password'], $_POST['re_password'],
            $_POST['func_email'], $_POST['func_telefone'], $_POST['func_NIF'],
            $_POST['func_morada'], $_POST['func_codigoPostal'], $_POST['func_localidade'])) {

            $funcionario = new User(array(
                'username' => $_POST['username'],
                'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
                'email' => $_POST['func_email'],
                'telefone' => $_POST['func_telefone'],
                'nif' => $_POST['func_NIF'],
                'morada' => $_POST['func_morada'],
                'codigopostal' => $_POST['func_codigoPostal'],
                'localidade' => $_POST['func_localidade'],
                'role' => 1
            ));

            // is_valid: Validação normal|is_valid: Validação Normal|validate: Validação de password
            if ($funcionario->is_valid()) {
                $funcionario->save();
                $this->RedirectToRoute('funcionario', 'index');
            } else {
                // Mostrar erros
                $this->RenderView('funcionario', 'create', ['funcionario' => $funcionario]);
            }
        }else{
            $this->RenderView('funcionario', 'create',[]);
        }
    }

    public function edit($id)
    {
        $this->loginFilter();
        try
        {
            $funcionario = User::find([$id]);
            $this->RenderView('funcionario', 'edit', ['funcionario' => $funcionario]);
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'funcionario/index']);
        }
    }

    public function update($id)
    {
        $this->loginFilter();
        try
        {
            if(!isset($_POST['username'], $_POST['email'], $_POST['telefone'], $_POST['nif'], $_POST['morada'], $_POST['codigopostal'], $_POST['localidade']))
            {
                $this->RedirectToRoute('error', 'index', ['callbaclRoute' => 'funcionario/index']);
            }
            else
            {
                $_POST['ativo'] = ($_POST['ativo'] ? 1 : 0);

                $funcionario = User::find([$id]);
                $funcionario->update_attributes($_POST);

                if($funcionario->is_valid())
                {
                    $funcionario->save();
                    $this->RedirectToRoute('funcionario', 'index'); //redirecionar para o index
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
        $this->loginFilter();

        try
        {
            $funcionario = User::find([$id]);

            if($funcionario->delete())
            {
                $this->RedirectToRoute('funcionario', 'index');
            }
            else
            {
                $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'funcionario/index']);
            }
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'funcionario/index']);
        }
    }
}