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
require_once './controllers/DefinicoesController.php';
require_once './controllers/FaturacaoController.php';
require_once './controllers/LinhaFaturaController.php';

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
                case 'resetPassword':
                    $controller->passwordReset($_GET['id']);
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

        case "definicoes":
            $controller = new DefinicoesController();
            switch ($a)
            {
                case "index":
                    $controller->index();
                    break;

                case "updatePassword":
                    $controller->updatePassword();
                    break;

                case "updateEmail":
                    $controller->updateEmail();
                    break;

                default:
                    $errorController->index('definicoes/index');
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
                    $controller -> index();
                    break;
                case "show":
                    $controller -> show($_GET['id']);
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
                case "edit":
                    $controller->edit();
                    break;
                case "update":
                    $controller->update();
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

        case "fatura":
            $controller = new FaturacaoController();
            switch($a)
            {
                case 'index':
                    $controller->index();
                    break;

                case 'show':
                    if(isset($_GET['id']))
                        $controller->show($_GET['id']);
                    else
                        $controller->index();
                    break;

                case 'create':
                    $controller->create();
                    break;

                case 'selectCliente':
                    $controller->selectCliente();
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
                    if(isset($_GET['id']))
                        $controller->delete($_GET['id']);
                    else
                        $controller->index();
                    break;

                default:
                    $errorController->index('fatura/index');
                    break;
            }
            break;

        case "linhafatura":
            $controllerFatura = new FaturacaoController();

            if(!isset($_GET['id']) && !isset($_GET['idLinha']))
                $controllerFatura->index();

            $controller = new LinhaFaturaController();
            switch($a)
            {
                case 'create':
                    $controller->create($_GET['id']);
                    break;

                case 'selectProduto':
                    if(isset($_GET['destiny'])){
                        $id = $_GET['id'] ?? $_GET['idLinha'];
                        $controller->selectProduto($id, $_GET['destiny']);
                    }else
                        $controllerFatura->index();
                    break;

                case 'store':
                    $controller->store($_GET['id']);
                    break;

                case 'edit':
                    $controller->edit($_GET['idLinha']);
                    break;

                case 'update':
                    $controller->update($_GET['idLinha']);
                    break;

                case 'delete':
                    $controller->delete($_GET['id']);
                    break;

                default:
                    $errorController->index('fatura/index');
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