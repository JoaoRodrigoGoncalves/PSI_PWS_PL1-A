<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Criar Fatura</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=fatura&a=index">Faturas</a></li>
                        <li class="breadcrumb-item active">Criar Fatura</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container">
            <div class="row mt-2">
                <div class="col">
                    <form action="./router.php?c=fatura&a=store" method="post">
                        <div class="row mb-3 align-items-center">
                            <div class="col-2 mb-2">
                                <h4>Cliente</h4>
                            </div>
                            <div class="col-10 mb-2">
                                <a href="./router.php?c=fatura&a=selectCliente" class="btn btn-primary">Select Cliente</a>
                            </div>
                            <div class="col-2">
                                <label for="idCliente">Id</label>
                                <input type="text" id="idCliente" name="idCliente" class="form-control"
                                       value="<?= (isset($cliente) ? $cliente->id : '') ?>" readonly required>
                            </div>
                            <div class="col-2">
                                <label for="cliente">Nome</label>
                                <input type="text" id="cliente" name="cliente" class="form-control"
                                       value="<?= (isset($cliente) ? $cliente->username : '') ?>" disabled required>
                            </div>
                            <div class="col-2">
                                <label for="nifCliente">NIF</label>
                                <input type="text" id="nifCliente" name="nifCliente" class="form-control"
                                       value="<?= (isset($cliente) ? $cliente->nif : '') ?>" disabled required>
                            </div>
                        </div>
                        <div class="row mb-3 align-items-center">
                            <div class="col-12 mb-2">
                                <h4>Funcionario</h4>
                            </div>
                            <div class="col-2">
                                <label for="idFuncionario">Id</label>
                                <input type="text" id="idFuncionario" name="idFuncionario" class="form-control"
                                       value="<?= (isset($funcionario) ? $funcionario->id : '') ?>" readonly required>
                            </div>
                            <div class="col-2">
                                <label for="Funcionario">Nome</label>
                                <input type="text" id="Funcionario" name="Funcionario" class="form-control"
                                       value="<?= (isset($funcionario) ? $funcionario->username : '') ?>" disabled required>
                            </div>
                            <div class="col-2">
                                <label for="nifFuncionario">NIF</label>
                                <input type="text" id="nifFuncionario" name="nifFuncionario" class="form-control"
                                       value="<?= (isset($funcionario) ? $funcionario->nif : '') ?>" disabled required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="observacoes">Observação</label>
                            <input type="text" id="observacoes" name="observacoes" class="form-control"
                                   value="<?= (isset($fatura) ? $fatura->observacao : '') ?>">
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Lançar Fatura">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>