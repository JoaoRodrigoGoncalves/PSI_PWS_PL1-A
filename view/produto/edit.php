<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editar "<?= $produto->descricao ?>"</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=produtos&a=index">Produtos</a></li>
                        <li class="breadcrumb-item active">Editar "<?= $produto->descricao ?>"</li>
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
                    <div class="alert alert-warning" role="alert">Preços devem ser indicados sem IVA</div>
                    <form action="./router.php?c=produto&a=update&id=<?= $produto->id ?>" method="post">
                        <h3>Editar Produto</h3>
                        <div class="mb-3">
                            <input type="checkbox" id="ativo" name="ativo" <?= $produto->ativo ? 'checked' : ''?>>
                            <label for="ativo">Ativo</label>
                            <?= (isset($produto->errors) ? $produto->errors->on('ativo') : '') ?>
                        </div>
                        <div class="mb-3">
                            <label for="descricao">Descrição</label>
                            <input type="text" id="descricao" name="descricao" class="form-control" value="<?= $produto->descricao ?>" required>
                            <?= (isset($produto->errors) ? $produto->errors->on('descricao') : '') ?>
                        </div>
                        <div class="mb-3">
                            <label for="preco_unitario">Preço Unitário</label>
                            <input type="number" step="0.01" id="preco_unitario" name="preco_unitario" class="form-control" value="<?= $produto->preco_unitario ?>" required>
                            <?= (isset($produto->errors) ? $produto->errors->on('preco_unitario') : '') ?>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="taxa_id">Taxa de IVA</label>
                                    <select class="form-control" id="taxa_id" name="taxa_id">
                                        <?php foreach ($taxas_iva as $taxa){ ?>
                                            <option <?= $produto->taxa_id == $taxa->id ? 'selected' : '' ?> value="<?= $taxa->id ?>"><?= $taxa->descricao ?> (<?= $taxa->valor ?>%)</option>
                                        <?php } ?>
                                    </select>
                                    <?= (isset($produto->errors) ? $produto->errors->on('taxa_id') : '') ?>
                                </div>
                            </div>
                            <div class="col-12 col-sm">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="stock">Stock</label>
                                    <input type="number" step="0.01" id="stock" name="stock" class="form-control" value="<?= $produto->stock ?>">
                                    <select id="unidade_id" name="unidade_id" class="form-control">
                                        <?php foreach($unidades as $unidade){ ?>
                                            <option <?= $produto->unidade_id == $unidade->id ? 'selected' : '' ?> value="<?= $unidade->id ?>"><?= $unidade->unidade ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= (isset($produto->errors) ? $produto->errors->on('stock') : '') ?>
                                    <?= (isset($produto->errors) ? $produto->errors->on('unidade_id') : '') ?>
                                </div>
                            </div>
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