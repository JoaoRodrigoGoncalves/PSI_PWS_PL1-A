<?php
class ClientController extends BaseAuthController{
    public function index()
    {
        $this->loginFilter();
        $clientes = User::find_all_by_role(0);
        $this->RenderView('cliente', 'index', ['clientes' => $clientes]);
    }
    public function create()
    {
        $this->loginFilter();
        $this->RenderView('cliente', 'create'); //mostrar a vista create
    }
    public function store()
    {
        $this->loginFilter();

        if(isset($_POST['username'], $_POST['email'], $_POST['telefone'], $_POST['nif'], $_POST['morada'], $_POST['codigopostal'], $_POST['localidade']))
        {
            $cliente = new User(array(
                'username' => $_POST['username'],
                'password' => password_hash('12345', PASSWORD_BCRYPT),
                'email' => $_POST['email'],
                'telefone' => $_POST['telefone'],
                'nif' => $_POST['nif'],
                'morada' => $_POST['morada'],
                'codigopostal' => $_POST['codigopostal'],
                'localidade' => $_POST['localidade'],
                'role' => 0
            ));

            if($cliente->is_valid()){
                $cliente->save();
                $this->RedirectToRoute('cliente', 'index'); //redirecionar para o index
            }
            else {
                //mostrar vista create passando o modelo como parâmetro
                $this->renderView('cliente', 'create', ['clientes' => $cliente]);
            }
        }
        else
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'cliente/index']);
        }

    }
    public function edit($id)
    {
        $this->loginFilter();

        try
        {
            $cliente = User::find([$id]);
            $this->renderView('cliente', 'edit', ['cliente' => $cliente]);
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'cliente/index']);
        }
    }
    public function update($id)
    {
        $this->loginFilter();

        if(isset($_POST['username'], $_POST['email'], $_POST['telefone'], $_POST['nif'], $_POST['morada'], $_POST['codigopostal'], $_POST['localidade']))
        {
            try
            {
                $cliente = User::find([$id]);

                $cliente->update_attributes(array(
                    'username' => $_POST['username'],
                    'email' => $_POST['email'],
                    'telefone' => $_POST['telefone'],
                    'nif' => $_POST['nif'],
                    'morada' => $_POST['morada'],
                    'codigopostal' => $_POST['codigopostal'],
                    'localidade' => $_POST['localidade']
                ));

                if($cliente->is_valid()){
                    $cliente->save();
                    $this->RedirectToRoute('cliente', 'index');//redirecionar para o index
                }
                else {
                    $this->renderView('cliente', 'edit', ['clientes' => $cliente]);
                    //mostrar vista edit passando o modelo como parâmetro
                }
            }
            catch (Exception $_)
            {
                $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'client/index']);
            }
        }
    }
    public function delete($id)
    {
        $this->loginFilter();

        try
        {
            $cliente = User::find([$id]);

            if($cliente->delete())
            {
                $this->RedirectToRoute('registo', 'index');//redirecionar para o index
            }
            else
            {
                $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'cliente/index']);
            }
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'cliente/index']);
        }
    }
}