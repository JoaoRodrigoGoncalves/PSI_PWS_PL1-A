<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Criar Fatura (Selecionar Cliente)</h1>
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
                            <div class="col-12 col-sm-2">
                                <label for="idCliente">ID</label>
                                <input type="text" id="idCliente" name="idCliente" class="form-control"
                                       value="<?= (isset($cliente) ? $cliente->id : '') ?>" readonly required>
                            </div>
                            <div class="col-12 col-sm-8">
                                <label for="cliente">Nome</label>
                                <input type="text" id="cliente" name="cliente" class="form-control"
                                       value="<?= (isset($cliente) ? $cliente->username : '') ?>" readonly required>
                            </div>
                            <div class="col-12 col-sm-2">
                                <label for="nifCliente">NIF</label>
                                <input type="text" id="nifCliente" name="nifCliente" class="form-control"
                                       value="<?= (isset($cliente) ? $cliente->nif : '') ?>" readonly required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <a href="./router.php?c=cliente&a=select" class="btn btn-primary">Selecionar Cliente</a>
                            <input type="submit" class="btn btn-success" value="Continuar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>