<?php
require_once './startup/boot.php';
require_once './controllers/SiteController.php';
require_once './controllers/LoginController.php';
require_once './controllers/ErrorController.php';
require_once './controllers/SetupPageController.php';
require_once './controllers/EmpresaController.php';
require_once './controllers/DashboardController.php';

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

    $errorController = new ErrorController();

    switch ($c)
    {

        case "site":
            $controller = new SiteController();
            $controller->index();
            break;

        case "setup":
            $controller = new SetupPageController();
            switch($a)
            {
                case "index":
                    $controller->index();
                    break;

                case "store":
                    $controller->store();
                    break;

                default:
                    $errorController->index(null);
                    break;
            }
            break;

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
                    break;

                default:
                    $errorController->index(null);
                    break;
            }
            break;

        case "dashboard":
            $controller = new DashboardController();
            switch($a)
            {
                case "index":
                    $controller->index();
                    break;

                default:
                    $errorController->index('dashboard/index');
                    break;
            }
            break;

        case 'empresa':
            $controller = new EmpresaController();
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

                default:
                    $errorController->index('empresa/index');
                    break;
            }
            break;

        case "error":
            switch($a)
            {
                case "index":
                    if(isset($_GET['callbackRoute']))
                    {
                        $errorController->index($_GET['callbackRoute']);
                    }
                    else
                    {
                        $errorController->index(null);
                    }
                    break;
            }
            break;

        default:
            $errorController->index(null);
            break;
    }

}