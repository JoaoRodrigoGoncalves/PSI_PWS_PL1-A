<?php

class BaseController
{
    protected function RenderView($prefix, $view, $parametros = []){
        extract($parametros);

        $auth = new Auth();

        if(in_array($prefix, ['error', 'login', 'setup'])) // Estas páginas fogem à regra sendo assim desenhadas de forma diferente.
        {
            require_once './view/' . $prefix . '/' . $view . '.php';
            return;
        }

        if($auth->isLoggedIn())
        {
            $username = $auth->getUsername();
            $userRole = $auth->getRole();

            require_once './view/layoutBO/header.php';
            require_once './view/'.$prefix.'/'.$view.'.php';
            require_once './view/layoutBO/footer.php';
        }
        else
        {
            require_once './view/layoutFO/header.php';
            require_once './view/'.$prefix.'/'.$view.'.php';
            require_once './view/layoutFO/footer.php';
        }
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