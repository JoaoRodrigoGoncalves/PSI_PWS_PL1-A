<?php

class BaseController
{

    protected function RenderView($prefix, $view, array $parametros){
        extract($parametros);
        require_once './view/layout/header.php';
        require_once './view/'.$prefix.'/'.$view.'.php';
        require_once './view/layout/footer.php';
    }

    protected function RedirectRout(){
        header('Location: ./router.php');
    }

    protected function RedirectToRout($controllerPrefix, $action){
        header('Location: ./router.php?c='.$controllerPrefix.'&a='.$action);
    }

    protected function RedirectToRoutParam($controllerPrefix, $action,  $params = []){
        $url = 'Location: ./router.php?c='.$controllerPrefix.'&a='.$action;
        foreach ($params as $paramKey => $paramValue)
            $url .= '&'.$paramKey.'='.$paramValue;
        header($url);
    }
}