<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="./public/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="./public/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="./public/plugins/sweetalert2/sweetalert2.min.css">
    <title><?=APP_NAME ?></title>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- User Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header"><?= $username ?></span>
                        <div class="dropdown-divider"></div>
                        <a href="./router.php?c=definicoes&a=index" class="dropdown-item">
                            <i class="fas fa-cog mr-2"></i> Definições
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="./router.php?c=login&a=logout" class="dropdown-item">
                            <i class="fas fa-sign-out-alt mr-2"></i> Terminar Sessão
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="./router.php" class="brand-link">
<!--                <img src="dist/img/AdminLTELogo.png" alt="Fatura+" class="brand-image img-circle elevation-3" style="opacity: .8">-->
                <span class="brand-text font-weight-light">Fatura+</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="./router.php?c=dashboard&a=index" class="nav-link">
                                <i class="nav-icon fas fa-columns"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <?php if(in_array($userRole, ['funcionario', 'administrador'])){ ?>
                            <li class="nav-item">
                                <a href="./router.php?c=cliente&a=index" class="nav-link">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Clientes
                                    </p>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if(in_array($userRole, ['administrador'])){ ?>
                            <li class="nav-item">
                                <a href="./router.php?c=funcionario&a=index" class="nav-link">
                                    <i class="nav-icon fas fa-user-tie"></i>
                                    <p>
                                        Funcionários
                                    </p>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if(in_array($userRole, ['funcionario', 'administrador'])){ ?>
                            <li class="nav-item">
                                <a href="./router.php?c=produto&a=index" class="nav-link">
                                    <i class="nav-icon fas fa-barcode"></i>
                                    <p>
                                        Produtos
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./router.php?c=unidade&a=index" class="nav-link">
                                    <i class="nav-icon fas fa-balance-scale"></i>
                                    <p>
                                        Gerir Unidades
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./router.php?c=taxa&a=index" class="nav-link">
                                    <i class="nav-icon fas fa-coins"></i>
                                    <p>
                                        Taxas
                                    </p>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if(in_array($userRole, ['administrador'])) {?>
                            <li class="nav-item">
                                <a href="./router.php?c=empresa&a=index" class="nav-link">
                                    <i class="nav-icon fas fa-cogs"></i>
                                    <p>
                                        Empresa
                                    </p>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>