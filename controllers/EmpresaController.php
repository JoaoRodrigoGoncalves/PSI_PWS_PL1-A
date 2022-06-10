<?php

require_once 'models/Empresa.php';

class EmpresaController extends BaseAuthController
{
    function index(){
        $this->filterByRole(['administrador']);
        $empresa = Empresa::first();
        $this->RenderView('empresa', 'index', ['empresa' => $empresa]);
    }
    
    public function edit()
    {
        $this->filterByRole(['administrador']);

        $empresa = Empresa::first();
        $this->renderView('empresa', 'edit', ['empresa' => $empresa]);
    }

    public function update()
    {
        $this->filterByRole(['administrador']);

        if(isset($_POST['designacaosocial'], $_POST['capitalsocial'], $_POST['email'], $_POST['telefone'], $_POST['nif'], $_POST['morada'], $_POST['codigopostal'], $_POST['localidade']))
        {
            try
            {
                $empresa = Empresa::first();

                $empresa->update_attributes(array(
                    'designacaosocial' => $_POST['designacaosocial'], 
                    'capitalsocial'    => $_POST['capitalsocial'],                    
                    'email'            => $_POST['email'],
                    'telefone'         => $_POST['telefone'],
                    'nif'              => $_POST['nif'],
                    'morada'           => $_POST['morada'],
                    'codigopostal'     => $_POST['codigopostal'],
                    'localidade'       => $_POST['localidade']
                ));

                if($empresa->is_valid()){
                    $empresa->save();
                    $this->RedirectToRoute('empresa', 'index');//redirecionar para o index
                }
                else
                {
                    $this->renderView('empresa', 'edit', ['empresa' => $empresa]);
                    //mostrar vista edit passando o modelo como parâmetro
                }
            }
            catch (Exception $_)
            {
                $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'empresa/index']);
            }
        }
    }
}