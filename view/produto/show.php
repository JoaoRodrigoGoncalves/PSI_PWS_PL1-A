<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detalhes</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=produtos&a=index">Produtos</a></li>
                        <li class="breadcrumb-item active"><?= $produto->descricao ?></li>
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
                            <h2 class="d-inline p-2"><?=$produto->descricao?></h2>
                            <div class="card-tools">
                                <div class="btn-toolbar">
                                    <div class="btn-group mr-2">
                                        <a href="router.php?c=produto&a=edit&id=<?=$produto->id ?>" role="button" class="btn"><i class="fas fa-edit"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="#" data-toggle="modal" data-target="#modalDelete" class="btn"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="blockquote mb-0">
                                <div class="row">
                                    <div class="col-12 pt-4">
                                        <p><b>Ref:</b> <?=$produto->id ?></p>
                                    </div>
                                    <div class="col-12">
                                        <p><b>Descrição:</b> <?=$produto->descricao?></p>
                                    </div>
                                    <div class="col-12">
                                        <p><b>Preço:</b> <?=$produto->preco_unitario ?>€</p>
                                    </div>
                                    <div class="col-12">
                                        <p><b>Iva:</b> <?=$produto->taxa->valor ?>%</p>
                                    </div>
                                    <div class="col-12">
                                        <p><b>Stock:</b> <?=$produto->stock . $produto->unidade->unidade ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDelete" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <p>Pretende mesmo apagar este Produto?</p>
            </div>
            <div class="modal-footer">
                <a href="./router.php?c=produto&a=delete&id=<?= $produto->id ?>" class="btn btn-danger">Apagar</a>
                <a href="#" class="btn btn-info" data-dismiss="modal">Cancelar</a>
            </div>
        </div>
    </div>
</div>
