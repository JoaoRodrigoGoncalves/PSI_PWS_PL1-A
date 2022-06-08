<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detalhes de "<?= $cliente->username ?>"</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=cliente&a=index">Clientes</a></li>
                        <li class="breadcrumb-item active">Detalhes de "<?= $cliente->username ?>"</li>
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
                            <h2 class="d-inline p-2"><?=$cliente->username?></h2>
                            <div class="card-tools">
                                <div class="btn-toolbar">
                                    <div class="btn-group mr-2">
                                        <a href="router.php?c=cliente&a=edit&id=<?=$cliente->id ?>" class="btn" role="button"><i class="fas fa-edit" data-toggle="tooltip" data-placement="left" title="Editar"></i></a>
                                    </div>
                                    <div class="btn-group mr-2">
                                        <a href="router.php?c=cliente&a=resetPassword&id=<?=$cliente->id ?>" class="btn" role="button"><i class="fas fa-key" data-toggle="tooltip" data-placement="left" title="Repor Palavra-Passe"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="#" class="btn" data-toggle="modal" data-target="#modalDelete"><i class="fas fa-trash-alt" data-toggle="tooltip" data-placement="left" title="Apagar"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="blockquote mb-0">
                                <div class="row">
                                    <div class="col-12 pt-4">
                                        <p><b>Email:</b> <?=$cliente->email?></p>
                                    </div>
                                    <div class="col-12">
                                        <p><b>Nif:</b> <?=$cliente->nif?></p>
                                    </div>
                                    <div class="col-12">
                                        <p><b>Morada:</b> <?=$cliente->morada . ', ' . $cliente->localidade . ', ' . $cliente->codigopostal?></p>
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
                <p>Pretende mesmo apagar este Cliente?</p>
            </div>
            <div class="modal-footer">
                <a href="./router.php?c=cliente&a=delete&id=<?= $cliente->id ?>" class="btn btn-danger">Apagar</a>
                <a href="#" class="btn btn-info" data-dismiss="modal">Cancelar</a>
            </div>
        </div>
    </div>
</div>