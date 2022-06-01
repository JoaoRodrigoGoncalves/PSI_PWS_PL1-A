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
                        <div class="mb-3">
                            <input type="checkbox" id="ativo" name="ativo" <?= (isset($produto->errors) ? ($produto->ativo ? 'checked' : '' ) : '') ?>>
                            <label for="ativo">Ativo</label>
                            <?= (isset($produto->errors) ? $produto->errors->on('ativo') : '') ?>
                        </div>
                        <div class="mb-3">
                            <label for="descricao">Descrição</label>
                            <input type="text" id="descricao" name="descricao" class="form-control" value="<?= (isset($produto->errors) ? $produto->descricao : '') ?>" required>
                            <?= (isset($produto->errors) ? $produto->errors->on('descricao') : '') ?>
                        </div>
                        <div class="mb-3">
                            <label for="preco_unitario">Preço Unitário</label>
                            <input type="number" step="0.01" id="preco_unitario" name="preco_unitario" class="form-control" value="<?= (isset($produto->errors) ? $produto->preco_unitario : '') ?>" required>
                            <?= (isset($produto->errors) ? $produto->errors->on('preco_unitario') : '') ?>
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
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="stock">Stock</label>
                            <input type="number" step="0.01" id="stock" name="stock" class="form-control" value="<?= (isset($produto->errors) ? $produto->stock : '') ?>">
                            <select id="unidade_id" name="unidade_id" class="form-select">
                                <?php foreach($unidades as $unidade){ ?>
                                    <option value="<?= $unidade->id ?>"><?= $unidade->unidade ?></option>
                                <?php } ?>
                            </select>
                            <?= (isset($produto->errors) ? $produto->errors->on('stock') : '') ?>
                            <?= (isset($produto->errors) ? $produto->errors->on('unidade_id') : '') ?>
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