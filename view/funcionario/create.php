<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registar Funcionário</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=funcionario&a=index">Funcionarios</a></li>
                        <li class="breadcrumb-item active">Registar Funcionario</li>
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
                    <form action="router.php?c=funcionario&a=store" method="post" class="needs-validation row justify-content-center" novalidate>
                        <div class="col col-6">
                            <div class="mb-3">
                                <label for="username">Nome de utilizador</label>
                                <input type="text" name="username" id="username" class="form-control" maxlength="100" required value="<?= $funcionario->username ?>">
                                <?php if($funcionario -> errors && $funcionario -> errors -> is_invalid('username')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $funcionario->errors->on('username') ?></span>
                                <?php } ?>  
                            </div>
                            <div class="mb-3">
                                <label for="func_email">Email</label>
                                <input type="email" name="func_email" id="func_email" class="form-control" maxlength="100" required value="<?= $funcionario->email ?>">
                                <?php if($funcionario -> errors && $funcionario -> errors -> is_invalid('email')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $funcionario->errors->on('email') ?></span>
                                <?php } ?> 
                            </div>
                            <div class="mb-3">
                                <label for="func_telefone">Telefone</label>
                                <input type="number" name="func_telefone" id="func_telefone" class="form-control" required maxlength="9" value="<?= $funcionario->telefone ?>">
                                <?php if($funcionario -> errors && $funcionario -> errors -> is_invalid('telefone')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $funcionario->errors->on('telefone') ?></span>
                                <?php } ?> 
                            </div>
                            <div class="mb-3">
                                <label for="func_NIF">Número de Identificação Fiscal</label>
                                <input type="number" name="func_NIF" id="func_NIF" class="form-control" required maxlength="9" value="<?= $funcionario->nif ?>">
                                <?php if($funcionario -> errors && $funcionario -> errors -> is_invalid('nif')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $funcionario->errors->on('nif') ?></span>
                                <?php } ?> 
                            </div>
                            <div class="mb-3">
                                <label for="func_morada">Morada</label>
                                <input type="text" name="func_morada" id="func_morada" class="form-control" required maxlength="100" value="<?= $funcionario->morada ?>">
                                <?php if($funcionario -> errors && $funcionario -> errors -> is_invalid('morada')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $funcionario->errors->on('morada') ?></span>
                                <?php } ?> 
                            </div>
                            <div class="mb-3">
                                <label for="func_codigoPostal">Código Postal</label>
                                <input type="text" name="func_codigoPostal" id="func_codigoPostal" class="form-control" required maxlength="8" value="<?= $funcionario->codigopostal ?>">
                                <?php if($funcionario -> errors && $funcionario -> errors -> is_invalid('codigopostal')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $funcionario->errors->on('codigopostal') ?></span>
                                <?php } ?> 
                            </div>
                            <div class="mb-3">
                                <label for="func_localidade">Localidade</label>
                                <input type="text" name="func_localidade" id="func_localidade" class="form-control" required maxlength="40" value="<?= $funcionario->localidade ?>">
                                <?php if($funcionario -> errors && $funcionario -> errors -> is_invalid('localidade')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $funcionario->errors->on('localidade') ?></span>
                                <?php } ?> 
                            </div>
                            <input type="submit" class="btn btn-primary" value="Gravar">
                            <a href="./router.php?c=cliente&a=index" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>