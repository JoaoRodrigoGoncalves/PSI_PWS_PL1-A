<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editar <?= $funcionario->username ?></h1>
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
                    <div class="alert-primary align-items-center" style="display: flex">
                        <h1 class="p-2"><?=$funcionario->username?></h1>
                        <div class="mx-2">
                            <a href="router.php?c=funcionario&a=edit&id=<?=$funcionario->id ?>" class="btn btn-info" role="button">Edit</a>
                        </div>
                        <div class="mx-2">
                            <a href="router.php?c=funcionario&a=delete&id=<?=$funcionario->id ?>" class="btn btn-warning " role="button">Delete</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
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