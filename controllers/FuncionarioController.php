<?php

class FuncionarioController extends BaseAuthController{
    public function index()
    {
        $funcionarios = [];//User::find_by_role(1);
        foreach (User::all() as $user)
            if($user->role == 1)
                array_push($funcionarios, $user);

        $this->loginFilter();
        
        $this->RenderView('func', 'index', ['funcionarios' => $funcionarios]);
    }

    public function show()
    {
        if(isset($_GET['id'])){
            $func = User::find([isset($_GET['id'])]);
            $this->RenderView('func', 'show', ['func' => $func]);
        }else{
            $this->RenderView('func', 'index', []);
        }
    }

    public function create()
    {
        $this->renderView('func', 'create');//mostrar a vista create
    }
    
    public function store()
    {
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
            if ($funcionario->is_valid() && $funcionario->validate()) {
                $funcionario->save();
                $this->RedirectToRoute('func', 'index');
            } else {
                // Mostrar erros
                $this->RenderView('func', 'create', ['func' => $funcionario]);
            }
        }else{
            $this->RenderView('func', 'create',[]);
        }
    }

    public function edit()
    {
        if(isset($_GET['id'])){
            $func = User::find([isset($_GET['id'])]);
            $this->RenderView('func', 'edit', ['func' => $func]);
        }else{
            $this->RenderView('func', 'index', []);
        }
    }

    public function update()
    {
        $this->RenderView('func', 'index',[]);
    }

    public function delete()
    {
        if(isset($_GET['id'])){
            $func = User::find([$_GET['id']]);
            $func->delete();
        }
        $this->RedirectToRoute('func', 'index');//redirecionar para o index
    }
}