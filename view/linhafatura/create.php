<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registar Produto</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=fatura&a=index">Faturas</a></li>
                        <li class="breadcrumb-item active">Criar Linha Fatura</li>
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
                    <form action="./router.php?c=linhafatura&a=store&<?= $linhafatura->fatura->id ?>" method="post">
                        <div class="mb-3">
                            <label for="produto">Produto</label>
                            <input type="text" id="descricao" name="produto" class="form-control" value="<?= (isset($linhaFatura->errors) ? $linhaFatura->produto->descricao : '') ?>" required>
                            <?= (isset($linhaFatura->produto->errors) ? $linhaFatura->produto->errors->on('descricao') : '') ?>
                        </div>
                        <div class="mb-3">
                            <label for="valor">Valor do produto</label>
                            <input type="text" id="descricao" name="valor" class="form-control" value="<?= (isset($linhaFatura->errors) ? $linhaFatura->produto->valor : '') ?>" disabled required>
                            <?= (isset($linhaFatura->produto->errors) ? $linhaFatura->produto->errors->on('valor') : '') ?>
                        </div>
                        <div class="mb-3">
                            <label for="quantidade">Quantidade</label>
                            <input type="number" step="0.01" id="quantidade" name="quantidade" class="form-control" value="<?= (isset($linhaFatura->errors) ? $linhaFatura->quantidade : '') ?>" required>
                            <?= (isset($linhaFatura->errors) ? $linhaFatura->errors->on('quantidade') : '') ?>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="taxa_id">Taxa de IVA</label>
                            <select class="form-select" id="taxa_id" name="taxa_id">
                                <?php foreach ($taxas_iva as $taxa){ ?>
                                    <option value="<?= $taxa->id ?>"><?= $taxa->descricao ?> (<?= $taxa->valor ?>%)</option>
                                <?php } ?>
                            </select>
                            <?= (isset($produto->errors) ? $produto->errors->on('taxa_id') : '') ?>
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Guardar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>