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
                        <li class="breadcrumb-item"><a href="./router.php?c=funcionario&a=index">Funcionarios</a></li>
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
                    <form action="router.php?c=funcionario&a=update&id=<?=$funcionario->id?>" method="post" class="needs-validation justify-content-center">
                        <div class="row mb-5">
                            <div class="col-5 mb-2">
                                <label for="username">Nome de utilizador</label>
                                <input type="text" name="username" id="username"
                                       class="form-control" maxlength="100"
                                       required value="<?=$funcionario->username?>">
                            </div>
                            <div class="col-5 mb-2">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email"
                                       class="form-control" maxlength="100"
                                       required value="<?=$funcionario->email?>">
                            </div>
                            <div class="col-2 form-check form-switch">
                                <input class="form-check-input" type="checkbox"
                                       id="flexSwitchCheckChecked" name="ativo"
                                    <?=$funcionario->ativo ? 'checked' : ''?>>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Ativo</label>
                            </div>
                            <div class="col-6 mb-2">
                                <label for="telefone">Telefone</label>
                                <input type="number" name="telefone" id="telefone"
                                       class="form-control" required maxlength="9"
                                       value="<?=$funcionario->telefone?>">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="NIF">Número de Identificação Fiscal</label>
                                <input type="number" name="nif" id="NIF"
                                       class="form-control" required maxlength="9"
                                       value="<?=$funcionario->nif?>">
                            </div>
                            <div class="col-4 mb-2">
                                <label for="morada">Morada</label>
                                <input type="text" name="morada" id="morada"
                                       class="form-control" required maxlength="100"
                                       value="<?=$funcionario->morada?>" >
                            </div>
                            <div class="col-4 mb-2">
                                <label for="codigoPostal">Código Postal</label>
                                <input type="text" name="codigopostal" id="codigoPostal"
                                       class="form-control" required maxlength="8"
                                       value="<?=$funcionario->codigopostal?>">
                            </div>
                            <div class="col-4 mb-2">
                                <label for="localidade">Localidade</label>
                                <input type="text" name="localidade" id="localidade"
                                       class="form-control" required maxlength="40"
                                       value="<?=$funcionario->localidade?>">
                            </div>
                            <div class="col-12 mb-2">
                                <input type="submit" class="btn btn-success mt-2 w-100" value="Gravar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>