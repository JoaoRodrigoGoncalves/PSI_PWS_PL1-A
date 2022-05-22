<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap Style-->
    <link rel="stylesheet" href="public/css/bootstrap.css">
    <title><?=APP_NAME ?></title>
</head>
<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./router.php?"><?= APP_NAME ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <?php
                if($auth->isLoggedIn())
                {
                ?>
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Menu 1</a>
                        </li>
                    </ul>
                <?php
                }
                ?>
            </div>
            <?php
            if($auth->isLoggedIn())
            {
            ?>
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userMenuDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $auth->getUsername() ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenuDropdown">
                            <li><a class="dropdown-item" href="#">Definições Empresa</a></li>
                            <li><a class="dropdown-item" href="#">Definições User</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="./router.php?c=login&a=logout">Terminar Sessão</a></li>
                        </ul>
                    </li>
                </ul>
            <?php
            }
            else
            {
           ?>
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="./router.php?c=login&a=index">Iniciar Sessão</a>
                    </li>
                </ul>
            <?php
            }
            ?>

        </div>
    </nav>
</body>
</html>

