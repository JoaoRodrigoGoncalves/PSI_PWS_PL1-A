<?php

use ActiveRecord\ActiveRecordException;
use ActiveRecord\RecordNotFound;

class EmpresaController extends BaseAuthController
{
    function index(){
        $empresas = Empresa::all();
        $this->RenderView('empresa', 'index', ['empresas' => $empresas]);
    }
}