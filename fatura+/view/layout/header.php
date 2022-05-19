<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap Style-->
    <link rel="stylesheet" href="public/css/bootstrap/bootstrap.css">
    <!--Personalise Style-->
    <link rel="stylesheet" href="public/css/style.css">
    <title><?=APP_NAME ?></title>
</head>
<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0 align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="router.php?"><b><?=APP_NAME?></b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="router.php?c=plano&a=index">Calculo plano</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="router.php?c=book&a=index">Ver Libro</a>
                    </li>

                    <?php
                    $login = new Login();
                    if($login->isLoggedIn())
                        echo '<li class="nav-item">
                                <a class="nav-link" href="router.php?c=login&a=out">Log out</a> 
                            <li>    
                            <li class="nav-item">
                                <h3 class="nav-link" >('.$login->getUsername().')</h3>
                            </li>';
                    else
                        echo '<a class="nav-link" href="router.php?c=login&a=index">Login</a>';
                    ?>
                </ul>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown button
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
</html>