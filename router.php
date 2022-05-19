<?php
require_once './startup/boot.php';
require_once './controllers/SiteController.php';
require_once './controllers/LoginController.php';
require_once './controllers/ErrorController.php';

if(!isset($_GET['c'], $_GET['a']))
{
    // omissão, enviar para site
    $controller = new SiteController();
    $controller->index();
}
else
{
    // existem parametros definidos
    $c = $_GET['c'];
    $a = $_GET['a'];

    switch ($c)
    {
        case "login":
            $controller = new LoginController();
            switch ($a)
            {
                case "index":
                    $controller->index();
                    break;

                case "login":
                    $controller->login();
                    break;

                case "logout":
                    $controller->logout();

                default:
                    $controller->index();
            }
            break;

        case "site":
            $controller = new SiteController();
            $controller->index();
            break;

        case "error":
            $controller = new ErrorController();
            switch($a)
            {
                case "index":
                    if(isset($_GET['callbackRoute']))
                    {
                        $controller->index($_GET['callbackRoute']);
                    }
                    else
                    {
                        $controller->index(null);
                    }
                    break;
            }
            break;

        default:
            $controller = new SiteController();
            $controller->index();
    }

}