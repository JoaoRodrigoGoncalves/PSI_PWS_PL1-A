<?php
class ClientController extends BaseAuthController{
    public function index()
    {
        $clientes = [];
        foreach (User::all() as $user)
            if($user->role == 0)
                array_push($clientes, $user);
        $this->RenderView('registoClient', 'index', ['clientes' => $clientes]);
    }
    public function create()
    {
        $this->RenderView('registoClient', 'create');//mostrar a vista create
    }
    public function store()
    {
        $clientes = new User(array(
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
        if($clientes->is_valid()){
            $clientes->save();
            $this->RedirectToRoute('registo', 'index');//redirecionar para o index
        } 
        else {
            $this->renderView('registoClient', 'create', ['clientes' => $clientes]);
            //mostrar vista create passando o modelo como parâmetro
        }
    }
    public function edit($id)
    {
        $clientes = User::find([$id]);
        if (is_null($clientes)) {
        //TODO redirect to standard error page
        } 
        else {
            $this->renderView('registoClient', 'edit', ['clientes' => $clientes]);
            //mostrar a vista edit passando os dados por parâmetro
        }
    }
    public function update($id)
    {
        $clientes = User::find([$id]);
        $clientes->update_attributes(array(
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'telefone' => $_POST['telefone'],
            'nif' => $_POST['nif'],
            'morada' => $_POST['morada'],
            'codigopostal' => $_POST['codigopostal'],
            'localidade' => $_POST['localidade']
        ));
        if($clientes->is_valid()){
            $clientes->save();
            $this->RedirectToRoute('registo', 'index');//redirecionar para o index
        } 
        else {
            $this->renderView('registoClient', 'edit', ['clientes' => $clientes]);
            //mostrar vista edit passando o modelo como parâmetro
        }
    }
    public function delete($id)
    {
        $clientes = User::find([$id]);
        $clientes->delete();
        $this->RedirectToRoute('registo', 'index');//redirecionar para o index
    }
}