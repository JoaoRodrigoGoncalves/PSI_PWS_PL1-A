<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-3">
                    <h1 class="m-0">Selecionar Produto</h1>
                </div><!-- /.col -->
                <div class="col-sm-9">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=fatura&a=index">Produtos</a></li>
                        <li class="breadcrumb-item active">Selecionar Produto</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <form action="<?= $reloadView?>" method="post" class="input-group input-group-sm">
                                    <a class="pt-1 mx-2" href="<?= $reloadView?>">Clear Filter</a>
                                    <select id="filter_type" class="form-control" name="filter_type">
                                        <option value="descricao">Descrição</option>
                                        <option value="stock">Stock</option>
                                        <option value="unidade">Unidade</option>
                                        <option value="preco_unitario">Preço Unitario</option>
                                        <option value="taxa">Taxa</option>
                                    </select>
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Procurar">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Referência</th>
                                    <th>Descrição</th>
                                    <th>Stock</th>
                                    <th>Unidade</th>
                                    <th>Preço</th>
                                    <th>Taxa</th>
                                    <th class="fit_column">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(count($produtos) > 0)
                                {
                                    foreach ($produtos as $produto)
                                    {
                                        ?>
                                        <tr>
                                            <td class="fit_column"><?= $produto->id ?></td>
                                            <td><?= $produto->descricao ?></td>
                                            <td class="fit_column"><?= $produto->stock ?></td>
                                            <td class="fit_column"><?= $produto->unidade->unidade ?></td>
                                            <td class="fit_column"><?= $produto->preco_unitario ?>€/<?= $produto->unidade->unidade ?></td>
                                            <td class="fit_column"><?= $produto->taxa->valor ?>%</td>
                                            <td>
                                                <a href="<?= $callbackRoute . '&idProduto=' . $produto->id?>"><button class="btn btn-primary" <?= $produto->stock == 0 ? 'disabled' : '' ?>>Selecionar</button></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <tr>
                                        <td colspan="5"><strong>Sem dados a mostrar</strong></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>