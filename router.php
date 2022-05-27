<?php
require_once './startup/boot.php';
require_once './controllers/SiteController.php';
require_once './controllers/AuthController.php';
require_once './controllers/ErrorController.php';
require_once './controllers/SetupPageController.php';
require_once './controllers/EmpresaController.php';
require_once './controllers/DashboardController.php';
require_once './controllers/TaxaController.php';
require_once './controllers/ProdutoController.php';
require_once './controllers/UnidadeController.php';
require_once './controllers/FuncionarioController.php';
require_once './controllers/ClienteController.php';

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
            $controller = new AuthController();
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

        case "funcionario":
            $controller = new FuncionarioController();
            switch($a)
            {
                case 'index':
                    $controller->index();
                    break;
                case 'show':
                    $controller->show($_GET['id']);
                    break;
                case 'create':
                    $controller->create();
                    break;
                case 'store':
                    $controller->store();
                    break;
                case 'edit':
                    $controller->edit($_GET['id']);
                    break;
                case 'update':
                    $controller->update($_GET['id']);
                    break;
                case 'delete':
                    $controller->delete($_GET['id']);
                    break;
                default:
                    $errorController->index('dashboard/index');
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
        
        case "taxa":
                $controller = new TaxaController();
                switch($a)
                {
                    case "index":
                        $controller->index();
                        break;
                    case 'create':
                        $controller -> create();
                        break;
                    case 'store':
                        $controller -> store();
                        break;
                    case 'edit':
                        $controller -> edit($_GET['id']);
                        break;
                    case 'update':
                        $controller -> update($_GET['id']);
                        break;
                    case 'delete':
                        $controller -> delete($_GET['id']);
                        break;
    
                    default:
                        $errorController->index('taxa/index');
                        break;
                }
                break;
        
        case "cliente":
            $controller = new ClienteController();
            switch($a)
            {
                case "index":
                    $controller->index();
                    break;
                case 'create':
                    $controller -> create();
                    break;
                case 'store':
                    $controller -> store();
                    break;
                case 'edit':
                    $controller -> edit($_GET['id']);
                    break;
                case 'update':
                    $controller -> update($_GET['id']);
                    break;
                case 'delete':
                    $controller -> delete($_GET['id']);
                    break;

                default:
                    $errorController->index('registo/index');
                    break;
                }
                break;

        case 'empresa':
            $controller = new EmpresaController();
            switch($a)
            {
                case "index":
                    $controller->index();
                    break;

                default:
                    $errorController->index('empresa/index');
                    break;
            }
            break;

        case "produto":
            $controller = new ProdutoController();
            switch($a)
            {
                case 'index':
                    $controller->index();
                    break;

                case 'show':
                    $controller->show($_GET['id']);
                    break;

                case 'create':
                    $controller->create();
                    break;

                case 'store':
                    $controller->store();
                    break;

                case 'edit':
                    $controller->edit($_GET['id']);
                    break;

                case 'update':
                    $controller->update($_GET['id']);
                    break;

                case 'delete':
                    $controller->delete($_GET['id']);
                    break;

                default:
                    $errorController->index('produto/index');
                    break;
            }
            break;

        case "unidade":
            $controller = new UnidadeController();
            switch($a)
            {
                case 'index':
                    $controller->index();
                    break;

                case 'create':
                    $controller->create();
                    break;

                case 'store':
                    $controller->store();
                    break;

                case 'edit':
                    $controller->edit($_GET['id']);
                    break;

                case 'update':
                    $controller->update($_GET['id']);
                    break;

                case 'delete':
                    $controller->delete($_GET['id']);
                    break;

                default:
                    $errorController->index('unidade/index');
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

                default:
                    $errorController->index(null);
                    break;
            }
            break;

        default:
            $errorController->index(null);
            break;
    }

}