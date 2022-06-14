<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Alterar Artigo</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=fatura&a=index">Faturas</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=fatura&a=show&id=<?=$linhafatura->fatura->id?>">Fatura Nº<?=$linhafatura->fatura->id?></a></li>
                        <li class="breadcrumb-item active">Alterar Linha Fatura</li>
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
                    <form action="./router.php?c=linhafatura&a=update&idLinha=<?= $linhafatura->id ?>" method="post">
                        <div class="row">
                            <div class="col-12 col-sm-2">
                                <label for="idProduto">Referência</label>
                                <input type="text" id="idProduto" name="idProduto" class="form-control"
                                       value="<?= ($produto->id != null ? $produto->id : $linhafatura->produto->id) ?>" readonly required>
                            </div>
                            <div class="col-12 col-sm-10 mb-3">
                                <label for="descricao">Descrição</label>
                                <input type="text" id="descricao" name="descricao" class="form-control"
                                       value="<?= ($produto->id != null ? $produto->descricao : $linhafatura->produto->descricao ) ?>" readonly required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-2 mb-3">
                                <label for="quantidade">Quantidade</label>
                                <input type="number" step="0.01" id="quantidade" name="quantidade" class="form-control"
                                       value="<?= (isset($linhafatura) ? $linhafatura->quantidade : '1') ?>" required>
                                <?php if($linhafatura -> errors && $linhafatura -> errors -> is_invalid('quantidade')){ ?>
                                    <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $linhafatura->errors->on('quantidade') ?></span>
                                <?php } ?>  
                            </div>
                            <div class="col-12 col-sm-10">
                                <label class="d-none d-sm-block">&nbsp;</label> <!-- HACK -->
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="taxa_id">Taxa de IVA</label>
                                    <select class="form-control" id="taxa_id" name="taxa_id">
                                        <?php foreach ($taxas as $taxa){ ?>
                                            <option value="<?= $taxa->id ?>" <?= (isset($linhafatura) ? ($linhafatura->taxa->id == $taxa->id ? 'selected': '') : '') ?>><?= $taxa->descricao ?> (<?= $taxa->valor ?>%)</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-success" value="Guardar">
                                <a href="./router.php?c=produto&a=select&callbackID=<?=$linhafatura->id?>&callbackRoute=linhafatura/edit" class="btn btn-primary">Trocar Produto</a>
                                <a href="./router.php?c=fatura&a=show&id=<?= $linhafatura->fatura->id ?>" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>