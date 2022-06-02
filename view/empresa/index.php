<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dados da Empresa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item active">Empresa</li>
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
                            <h2 class="d-inline p-2"><?=$empresa->designacaosocial?></h2>
                            <div class="card-tools">
                                <div class="btn-toolbar">
                                    <div class="btn-group mr-2" style="width: 150px; float:right;">
                                        <a href="router.php?c=empresa&a=edit&id=<?=$empresa->id ?>" class="btn btn-primary" role="button">Editar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="blockquote mb-0">
                                <div class="row">
                                    <div class="col-12 pt-4">
                                        <p><b>Capital Social:</b> <?=$empresa->capitalsocial?></p>
                                    </div>
                                    <div class="col-12">
                                        <p><b>Email:</b> <?=$empresa->email?></p>
                                    </div>
                                    <div class="col-12">
                                        <p><b>Telefone:</b> <?=$empresa->telefone?></p>
                                    </div>
                                    <div class="col-12">
                                        <p><b>Nif:</b> <?=$empresa->nif?></p>
                                    </div>
                                    <div class="col-12">
                                        <p><b>Morada:</b> <?=$empresa->morada . ', ' . $empresa->localidade . ', ' . $empresa->codigopostal?></p>
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