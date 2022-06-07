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
                        <li class="breadcrumb-item"><a href="./router.php?c=fatura&a=index">Faturas</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=linhafatura&a=show&id=<?=$id?>"><?=$id?></a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=linhafatura&a=<?=$destiny . ($destiny == 'create'? '&id=' : '&idLinha=' .$id) ?>&id=<?=$id?>"><?=$destiny == 'create' ? 'Criar' : 'Alterar'?> Linha Fatura</a></li>
                        <li class="breadcrumb-item active">Selecionar Produtos</li>
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
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Procurar">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Estado</th>
                                    <th>Descrição</th>
                                    <th>Stock</th>
                                    <th>Unidade</th>
                                    <th>Preço</th>
                                    <th>Taxa</th>
                                    <th>Ações</th>
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
                                            <td>
                                                <?php if($produto->ativo == 1){ ?>
                                                    <span class="badge bg-success">Ativo</span>
                                                <?php } else { ?>
                                                    <span class="badge bg-danger">Desativado</span>
                                                <?php } ?>
                                            </td>
                                            <td><?= $produto->descricao ?></td>
                                            <td><?= $produto->stock ?></td>
                                            <td><?= $produto->unidade->unidade ?></td>
                                            <td><?= $produto->preco_unitario ?>/<?= $produto->unidade->unidade ?></td>
                                            <td><?= $produto->taxa->valor ?>%</td>
                                            <td>
                                                <a href="./router.php?c=linhafatura&a=<?=$destiny. ($destiny == 'create'? '&id=' : '&idLinha='). $id . '&idProduto=' . $produto->id?>" class="btn btn-primary">Selecionar</a>
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