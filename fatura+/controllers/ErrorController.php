<?php
require_once './controllers/BaseController.php';

class ErrorController extends BaseController
{
    public function index($error){
        $this->RenderView('error','index', ['error' => $error]);
    }
}