<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Alterar Valores de Artigo</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=fatura&a=index">Faturas</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=fatura&a=show&id=<?=$linhafatura->fatura->id?>">Fatura Nº<?=$linhafatura->fatura->id?></a></li>
                        <li class="breadcrumb-item active">Alterar Valores de Artigo</li>
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
                            <div class="col mb-3">
                                <label for="descricao">Descrição</label>
                                <input type="text" id="descricao" name="descricao" class="form-control"
                                       value="<?= $linhafatura->produto->descricao ?>" readonly required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm mb-3">
                                <label for="quantidade">Quantidade (<?= $linhafatura->produto->stock ?> em stock)</label>
                                <input type="number" step="0.01" id="quantidade" name="quantidade" class="form-control"
                                       value="<?= $linhafatura->quantidade ?>" required>
                            </div>
                            <div class="col-12 col-sm mb-3">
                                <label class="d-none d-sm-block">&nbsp;</label> <!--Fix espaçamento-->
                                <div class="input-group">
                                    <label class="input-group-text" for="taxa_id">Taxa de IVA</label>
                                    <select class="form-control" id="taxa_id" name="taxa_id">
                                        <?php foreach ($taxas as $taxa){ ?>
                                            <option value="<?= $taxa->id ?>"><?= $taxa->descricao ?> (<?= $taxa->valor ?>%)</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <input type="submit" class="btn btn-success" value="Guardar">
                                <a href="http://localhost/faturamais/router.php?c=fatura&a=show&id=<?= $linhafatura->fatura->id ?>" class="btn btn-danger">Voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>