<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editar "<?= $funcionario->username ?>"</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=cliente&a=index">Funcionário</a></li>
                        <li class="breadcrumb-item active">Editar "<?= $funcionario->username ?>"</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="router.php?c=funcionario&a=update&id=<?=$funcionario->id?>" method="post" class="needs-validation row justify-content-center">
                        <div class="col col-6">
                            <div class="mb-3 pl-4">
                                <input class="form-check-input" type="checkbox"
                                       id="flexSwitchCheckChecked" name="ativo"
                                    <?=$funcionario->ativo ? 'checked' : ''?>>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Ativo</label>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Nome:</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?=$funcionario->username?>" required/>
                                <?php if($funcionario -> errors && $funcionario -> errors -> is_invalid('username')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $funcionario->errors->on('username') ?></span>
                                <?php } ?>
                            </div>
                            <div class="mb-3">
                                <label for="client_email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?=$funcionario->email?>" required>
                                <?php if($funcionario -> errors && $funcionario -> errors -> is_invalid('email')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $funcionario->errors->on('email') ?></span>
                                <?php } ?>
                            </div>
                            <div class="mb-3">
                                <label for="client_telefone" class="form-label">Telefone:</label>
                                <input type="number" class="form-control" id="telefone" name="telefone" value="<?=$funcionario->telefone?>" required>
                                <?php if($funcionario -> errors && $funcionario -> errors -> is_invalid('telefone')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $funcionario->errors->on('telefone') ?></span>
                                <?php } ?>
                            </div>
                            <div class="mb-3">
                                <label for="client_nif" class="form-label">Nif:</label>
                                <input type="number" class="form-control" id="nif" name="nif" value="<?=$funcionario->nif?>" required>
                                <?php if($funcionario -> errors && $funcionario -> errors -> is_invalid('nif')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $funcionario->errors->on('nif') ?></span>
                                <?php } ?>
                            </div>
                            <div class="mb-3">
                                <label for="client_morada" class="form-label">Morada:</label>
                                <input type="text" class="form-control" id="morada" name="morada" value="<?=$funcionario->morada?>" required>
                                <?php if($funcionario -> errors && $funcionario -> errors -> is_invalid('morada')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $funcionario->errors->on('morada') ?></span>
                                <?php } ?>
                            </div>
                            <div class="mb-3">
                                <label for="client_codigopostal" class="form-label">Código-Postal:</label>
                                <input type="text" class="form-control" id="codigopostal" name="codigopostal" value="<?=$funcionario->codigopostal?>" required>
                                <?php if($funcionario -> errors && $funcionario -> errors -> is_invalid('codigopostal')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $funcionario->errors->on('codigopostal') ?></span>
                                <?php } ?>
                            </div>
                            <div class="mb-3">
                                <label for="client_localidade" class="form-label">Localidade:</label>
                                <input type="text" class="form-control" id="localidade" name="localidade" value="<?=$funcionario->localidade?>" required>
                                <?php if($funcionario -> errors && $funcionario -> errors -> is_invalid('localidade')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $funcionario->errors->on('localidade') ?></span>
                                <?php } ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="./router.php?c=cliente&a=index" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>