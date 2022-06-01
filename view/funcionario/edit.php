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
                            </div>
                            <div class="mb-3">
                                <label for="client_email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?=$funcionario->email?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="client_telefone" class="form-label">Telefone:</label>
                                <input type="number" class="form-control" id="telefone" name="telefone" value="<?=$funcionario->telefone?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="client_nif" class="form-label">Nif:</label>
                                <input type="number" class="form-control" id="nif" name="nif" value="<?=$funcionario->nif?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="client_morada" class="form-label">Morada:</label>
                                <input type="text" class="form-control" id="morada" name="morada" value="<?=$funcionario->morada?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="client_codigopostal" class="form-label">Código-Postal:</label>
                                <input type="text" class="form-control" id="codigopostal" name="codigopostal" value="<?=$funcionario->codigopostal?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="client_localidade" class="form-label">Localidade:</label>
                                <input type="text" class="form-control" id="localidade" name="localidade" value="<?=$funcionario->localidade?>" required>
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