<?php

class BaseController
{
    protected function RenderView($prefix, $view, $parametros = []){
        extract($parametros);

        $auth = new Auth();

        require_once './view/layout/header.php';
        require_once './view/'.$prefix.'/'.$view.'.php';
        require_once './view/layout/footer.php';
    }

    protected function RedirectToRoute($controllerPrefix, $action,  $params = []){
        $url = 'Location: ./router.php?c='.$controllerPrefix.'&a='.$action;

        if(!empty($params))
        {
            foreach ($params as $paramKey => $paramValue)
            {
                $url .= '&'.$paramKey.'='.$paramValue;
            }
        }

        header($url);
    }
}