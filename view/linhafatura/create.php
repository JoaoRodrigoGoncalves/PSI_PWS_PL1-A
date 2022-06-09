<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Adicionar Artigo</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=fatura&a=index">Faturas</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=fatura&a=show&id=<?=$fatura->id?>">Fatura Nº<?=$fatura->id?></a></li>
                        <li class="breadcrumb-item active">Adicionar Artigo</li>
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
                    <form action="./router.php?c=linhafatura&a=store&id=<?= $fatura->id ?>" method="post">
                        <div class="row">
                            <div class="col-12 col-sm-2">
                                <label for="idProduto">Referência</label>
                                <input type="text" id="idProduto" name="idProduto" class="form-control"
                                       value="<?= (isset($produto) ? $produto->id : '') ?>" readonly required>
                            </div>
                            <div class="col-12 col-sm-10 mb-3">
                                <label for="descricao">Descrição</label>
                                <input type="text" id="descricao" name="descricao" class="form-control"
                                       value="<?= (isset($produto) ? $produto->descricao : '') ?>" readonly required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-2 mb-3">
                                <label for="quantidade">Quantidade</label>
                                <input type="number" step="0.01" id="quantidade" name="quantidade" class="form-control"
                                       value="<?= (isset($linhaFatura) ? $linhaFatura->quantidade : '1') ?>" required>
                            </div>
                            <div class="col-12 col-sm-10">
                                <label class="d-none d-sm-block">&nbsp;</label> <!-- HACK -->
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="taxa_id">Taxa de IVA</label>
                                    <select class="form-control" id="taxa_id" name="taxa_id">
                                        <?php foreach ($taxas_iva as $taxa){ ?>
                                            <option value="<?= $taxa->id ?>"><?= $taxa->descricao ?> (<?= $taxa->valor ?>%)</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-success" value="Adicionar">
                                <a href="./router.php?c=produto&a=select&idLinha=<?=$fatura->id?>&callbackRoute=linhafatura/create" class="btn btn-primary">Trocar Artigo</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>