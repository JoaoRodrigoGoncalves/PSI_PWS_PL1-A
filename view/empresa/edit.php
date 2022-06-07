<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editar "<?= $empresa->designacaosocial ?>"</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=empresa&a=index">Empresa</a></li>
                        <li class="breadcrumb-item active">Editar "<?= $empresa->designacaosocial ?>"</li>
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
                    <form action="router.php?c=empresa&a=update&id=<?=$empresa->id?>" method="post" class="needs-validation row justify-content-center">
                        <div class="col col-6">
                            <div class="mb-3">
                                <label for="empresa_designacao" class="form-label">Designacao Social:</label>
                                <input type="text" class="form-control" id="designacaosocial" name="designacaosocial" value="<?=$empresa->designacaosocial?>" required/>
                            </div>
                            <div class="mb-3">
                                <label for="empresa_capital" class="form-label">Capital Social:</label>
                                <input type="number" class="form-control" id="capitalsocial" name="capitalsocial" value="<?=$empresa->capitalsocial?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="empresa_email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?=$empresa->email?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="empresa_telefone" class="form-label">Telefone:</label>
                                <input type="number" class="form-control" id="telefone" name="telefone" value="<?=$empresa->telefone?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="empresa_nif" class="form-label">Nif:</label>
                                <input type="number" class="form-control" id="nif" name="nif" value="<?=$empresa->nif?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="empresa_morada" class="form-label">Morada:</label>
                                <input type="text" class="form-control" id="morada" name="morada" value="<?=$empresa->morada?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="empresa_codigopostal" class="form-label">Código-Postal:</label>
                                <input type="text" class="form-control" id="codigopostal" name="codigopostal" value="<?=$empresa->codigopostal?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="empresa_localidade" class="form-label">Localidade:</label>
                                <input type="text" class="form-control" id="localidade" name="localidade" value="<?=$empresa->localidade?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="./router.php?c=empresa&a=index" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>