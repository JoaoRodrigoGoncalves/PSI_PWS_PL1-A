<?php

use ActiveRecord\ActiveRecordException;
use ActiveRecord\RecordNotFound;

class EmpresaController extends BaseAuthController
{
    function index(){
        $this->filterByRole(['administrador']);
        $empresa = Empresa::all();
        $this->RenderView('empresa', 'index', ['empresa' => $empresa]);
    }
}