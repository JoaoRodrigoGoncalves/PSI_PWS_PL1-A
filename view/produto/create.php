<div class="container">
    <div class="row mt-2">
        <div class="col">
            <form action="./router.php?c=produto&a=store" method="post">
                <div class="mb-3">
                    <input type="checkbox" id="ativo" name="ativo" <?= (isset($produto->errors) ? ($produto->ativo ? 'checked' : '' ) : '') ?>>
                    <label for="ativo">Ativo</label>
                    <?= (isset($produto->errors) ? $produto->errors->on('ativo') : '') ?>
                </div>
                <div class="mb-3">
                    <label for="descricao">Descrição</label>
                    <input type="text" id="descricao" name="descricao" class="form-control" value="<?= (isset($produto->errors) ? $produto->descricao : '') ?>">
                    <?= (isset($produto->errors) ? $produto->errors->on('descricao') : '') ?>
                </div>
                <div class="mb-3">
                    <label for="preco_unitario">Preço Unitário</label>
                    <input type="text" id="preco_unitario" name="preco_unitario" class="form-control" value="<?= (isset($produto->errors) ? $produto->preco_unitario : '') ?>">
                    <?= (isset($produto->errors) ? $produto->errors->on('preco_unitario') : '') ?>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="iva_id">Taxa de IVA</label>
                    <select class="form-select" id="iva_id" name="iva_id">
                        <?php foreach ($taxas_iva as $taxa){ ?>
                            <option value="<?= $taxa->id ?>"><?= $taxa->descricao ?> (<?= $taxa->valor ?>%)</option>
                        <?php } ?>
                    </select>
                    <?= (isset($produto->errors) ? $produto->errors->on('iva_id') : '') ?>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="stock">Stock</label>
                    <input type="text" id="stock" name="stock" class="form-control" value="<?= (isset($produto->errors) ? $produto->stock : '') ?>">
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