<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Adicionar Produto Fatura nº<?=$fatura->id?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=fatura&a=index">Faturas</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=fatura&a=show&id=<?=$fatura->id?>"><?=$fatura->id?></a></li>
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
                    <form action="./router.php?c=linhafatura&a=store&id=<?= $fatura->id ?>" method="post">
                        <div class="row">
                            <div class="col-2 mb-2">
                                <h4>Produto</h4>
                            </div>
                            <div class="col-10 mb-2">
                                <a href="./router.php?c=linhafatura&a=selectProduto&id=<?=$fatura->id?>&destiny=create" class="btn btn-primary">Select Produto</a>
                            </div>
                            <div class="col-2">
                                <label for="idProduto">Id</label>
                                <input type="text" id="idProduto" name="idProduto" class="form-control"
                                       value="<?= (isset($produto) ? $produto->id : '') ?>" readonly required>
                            </div>
                            <div class="col-9 mb-3">
                                <label for="descricao">Descrição</label>
                                <input type="text" id="descricao" name="descricao" class="form-control"
                                       value="<?= (isset($produto) ? $produto->descricao : '') ?>" readonly required>
                            </div>
                            <div class="col-2 mb-3">
                                <label for="valor">Valor do produto</label>
                                <input type="text" id="descricao" name="valor" class="form-control"
                                       value="<?= (isset($produto) ? $produto->preco_unitario : '') ?>" required>
                            </div>
                            <div class="col-2 mb-3">
                                <label for="quantidade">Quantidade</label>
                                <input type="number" step="0.01" id="quantidade" name="quantidade" class="form-control"
                                       value="<?= (isset($linhaFatura) ? $linhaFatura->quantidade : '') ?>" required>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="taxa_id">Taxa de IVA</label>
                                <select class="form-select" id="taxa_id" name="taxa_id">
                                    <?php foreach ($taxas_iva as $taxa){ ?>
                                        <option value="<?= $taxa->id ?>"><?= $taxa->descricao ?> (<?= $taxa->valor ?>%)</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" value="Guardar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>