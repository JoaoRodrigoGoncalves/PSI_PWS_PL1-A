<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detalhes <?= $funcionario->username ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=funcionario&a=index">Funcionarios</a></li>
                        <li class="breadcrumb-item active">Editar <?= $funcionario->username ?></li>
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
                            <h2 class="d-inline p-2"><?=$funcionario->username?></h2>
                            <div class="card-tools">
                                <div class="btn-toolbar">
                                    <div class="btn-group mr-2" style="width: 150px; float:right;">
                                        <a href="router.php?c=funcionario&a=edit&id=<?=$funcionario->id ?>" class="btn btn-primary" role="button">Editar</a>
                                    </div>
                                    <div class="btn-group" style="width: 150px; float:right;">
                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete">Apagar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="blockquote mb-0">
                                <div class="row">
                                    <div class="col-12 pt-4">
                                        <p><b>Email:</b> <?=$funcionario->email?></p>
                                    </div>
                                    <div class="col-12">
                                        <p><b>Nif:</b> <?=$funcionario->nif?></p>
                                    </div>
                                    <div class="col-12">
                                        <p><b>Morada:</b> <?=$funcionario->morada . ', ' . $funcionario->localidade . ', ' . $funcionario->codigopostal?></p>
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
                <p>Pretende mesmo apagar este Funcionario?</p>
            </div>
            <div class="modal-footer">
                <a href="./router.php?c=funcionario&a=delete&id=<?= $funcionario->id ?>" class="btn btn-danger">Apagar</a>
                <a href="#" class="btn btn-info" data-dismiss="modal">Cancelar</a>
            </div>
        </div>
    </div>
</div>