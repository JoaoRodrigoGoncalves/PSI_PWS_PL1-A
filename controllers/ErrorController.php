<?php
require_once './controllers/BaseController.php';

class ErrorController extends BaseController
{
    public function index($callbackRoute){

        if($callbackRoute != null)
        {
            $parms = explode('/', $callbackRoute);
            $callbackRoute = "./router.php?c=" . $parms[0] . "&a=" . $parms[1];
        }

        $this->RenderView('error','index', ['callbackroute' => $callbackRoute]);
    }
}