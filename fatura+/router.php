<?php
#
require_once './startup/boot.php';

#Controllers
include_once './controllers/ErrorController.php';
include_once './controllers/LoginController.php';
include_once './controllers/SiteController.php';

if (!isset($_GET['c'], $_GET['a']))
{
    $siteController = new SiteController();
    $siteController->index();
}else{
    $c = $_GET['c'];
    $a = $_GET['a'];
    switch ($c){
        case 'login':
            $loginController = new LoginController();
            switch ($a){
                case 'index':
                    $loginController->index();
                    break;
                case 'loja':
                    $loginController->login();
                    break;
                case 'out':
                    $loginController->logOut();
                    break;
                default:
                    $loginController->index();
                    break;
            }
            break;
        case 'error':
            $errorController = new ErrorController();
            $errorController->index($a);
            break;
        default:
            header('Location: router.php?');
            break;
    }

}
