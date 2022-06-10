<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= APP_NAME ?> | Configurar aplicação</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="./public/plugins/fontawesome-free/css/all.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="./public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="./public/dist/css/adminlte.min.css">
    </head>
    <body style="background-color: #e9ecef;">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-6 bg-white p-4 rounded">
                    <div class="text-center">
                        <a href="./router.php?c=site&a=index" class="h1"><?= APP_NAME ?></a>
                        <p>Configure a aplicação para a começar a usar!</p>
                    </div>
                    <form action="./router.php?c=setup&a=store" method="post" class="row">
                        <div class="col-6">
                            <p class="login-box-msg">Dados Administrador</p>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Nome Completo" name="username" required value="<?= (isset($admin) || isset($empresa) ? $admin->username : '') ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user fa-fw"></span>
                                    </div>
                                </div>
                                <?php if($admin -> errors && $admin -> errors -> is_invalid('username')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $admin->errors->on('username') ?></span>
                                <?php } ?> 
                            </div>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="E-Mail" name="admin_email" required value="<?= (isset($admin) || isset($empresa) ? $admin->email : '') ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-at fa-fw"></span>
                                    </div>
                                </div>
                                <?php if($admin -> errors && $admin -> errors -> is_invalid('email')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $admin->errors->on('email') ?></span>
                                <?php } ?> 
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Palavra-Passe" name="password" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock fa-fw"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Repita Palavra-Passe" name="re_password" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock fa-fw"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="number" step="0" class="form-control" placeholder="Número de Contribuinte" name="admin_NIF" min="0" max="999999999" required value="<?= (isset($admin) || isset($empresa) ? $admin->nif : '') ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-id-card fa-fw"></span>
                                    </div>
                                </div>
                                <?php if($admin -> errors && $admin -> errors -> is_invalid('nif')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $admin->errors->on('nif') ?></span>
                                <?php } ?> 
                            </div>
                            <div class="input-group mb-3">
                                <input type="number" step="0" class="form-control" placeholder="Telemóvel" name="admin_telefone" min="200000000" max="999999999" required value="<?= (isset($admin) || isset($empresa) ? $admin->telefone : '') ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-mobile fa-fw"></span>
                                    </div>
                                </div>
                                <?php if($admin -> errors && $admin -> errors -> is_invalid('telefone')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $admin->errors->on('telefone') ?></span>
                                <?php } ?> 
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Morada" name="admin_morada" required value="<?= (isset($admin) || isset($empresa) ? $admin->morada : '') ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-map-marked-alt fa-fw"></span>
                                    </div>
                                </div>
                                <?php if($admin -> errors && $admin -> errors -> is_invalid('morada')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $admin->errors->on('morada') ?></span>
                                <?php } ?> 
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Código Postal" name="admin_codigoPostal" minlength="8" maxlength="8" required value="<?= (isset($admin) || isset($empresa) ? $admin->codigopostal : '') ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-mail-bulk fa-fw"></span>
                                    </div>
                                </div>
                                <?php if($admin -> errors && $admin -> errors -> is_invalid('codigopostal')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $admin->errors->on('codigopostal') ?></span>
                                <?php } ?> 
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Localidade" name="admin_localidade" required value="<?= (isset($admin) || isset($empresa) ? $admin->localidade : '') ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-city fa-fw"></span>
                                    </div>
                                </div>
                                <?php if($admin -> errors && $admin -> errors -> is_invalid('localidade')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $admin->errors->on('localidade') ?></span>
                                <?php } ?> 
                            </div>
                        </div>
                        <div class="col-6">
                            <p class="login-box-msg">Dados Empresa</p>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Designação Social" name="designacaoSocial" required value="<?= (isset($admin) || isset($empresa) ? $empresa->designacaosocial : '') ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-building fa-fw"></span>
                                    </div>
                                </div>
                                <?php if($empresa -> errors && $empresa -> errors -> is_invalid('designacaosocial')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $empresa->errors->on('designacaosocial') ?></span>
                                <?php } ?> 
                            </div>
                            <div class="input-group mb-3">
                                <input type="number" step="0.01" class="form-control" placeholder="Capital Social" name="capitalSocial" required value="<?= (isset($admin) || isset($empresa) ? $empresa->capitalsocial : '') ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-money-bill fa-fw"></span>
                                    </div>
                                </div>
                                <?php if($empresa -> errors && $empresa -> errors -> is_invalid('capitalsocial')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $empresa->errors->on('capitalsocial') ?></span>
                                <?php } ?> 
                            </div>
                            <div class="input-group mb-3">
                                <input type="number" step="0" class="form-control" placeholder="Número de Contribuinte" name="empresa_NIF" min="0" max="999999999" required value="<?= (isset($admin) || isset($empresa) ? $empresa->nif : '') ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-id-card fa-fw"></span>
                                    </div>
                                </div>
                                <?php if($empresa -> errors && $empresa -> errors -> is_invalid('nif')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $empresa->errors->on('nif') ?></span>
                                <?php } ?> 
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="E-mail" name="empresa_email" required value="<?= (isset($admin) || isset($empresa) ? $empresa->email : '') ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-at fa-fw"></span>
                                    </div>
                                </div>
                                <?php if($empresa -> errors && $empresa -> errors -> is_invalid('email')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $empresa->errors->on('email') ?></span>
                                <?php } ?> 
                            </div>
                            <div class="input-group mb-3">
                                <input type="number" step="0" class="form-control" placeholder="Telefone" name="empresa_telefone" min="200000000" max="999999999" required value="<?= (isset($admin) || isset($empresa) ? $empresa->telefone : '') ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone-alt fa-fw"></span>
                                    </div>
                                </div>
                                <?php if($empresa -> errors && $empresa -> errors -> is_invalid('telefone')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $empresa->errors->on('telefone') ?></span>
                                <?php } ?> 
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Morada" name="empresa_morada" required value="<?= (isset($admin) || isset($empresa) ? $empresa->morada : '') ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-map-marked-alt fa-fw"></span>
                                    </div>
                                </div>
                                <?php if($empresa -> errors && $empresa -> errors -> is_invalid('morada')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $empresa->errors->on('morada') ?></span>
                                <?php } ?> 
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Código Postal" name="empresa_codigoPostal" minlength="8" maxlength="8" required value="<?= (isset($admin) || isset($empresa) ? $empresa->codigopostal : '') ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-mail-bulk fa-fw"></span>
                                    </div>
                                </div>
                                <?php if($empresa -> errors && $empresa -> errors -> is_invalid('codigopostal')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $empresa->errors->on('codigopostal') ?></span>
                                <?php } ?> 
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Localidade" name="empresa_localidade" required value="<?= (isset($admin) || isset($empresa) ? $empresa->localidade : '') ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-city fa-fw"></span>
                                    </div>
                                </div>
                                <?php if($empresa -> errors && $empresa -> errors -> is_invalid('localidade')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $empresa->errors->on('localidade') ?></span>
                                <?php } ?> 
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Começar!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- jQuery -->
        <script src="./public/plugins/jquery/jquery.min.js"></script>
        <!-- inputmask -->
        <script src="./public/plugins/moment/moment.min.js"></script>
        <script src="./public/plugins/inputmask/jquery.inputmask.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="./public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="./public/dist/js/adminlte.min.js"></script>
    </body>
</html>