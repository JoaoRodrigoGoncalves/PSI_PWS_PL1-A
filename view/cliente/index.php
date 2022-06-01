<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Clientes</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item active">Clientes</li>
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
                            <a href="./router.php?c=cliente&a=create" class="btn btn-primary btn-sm">Registar Cliente</a>
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
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>NIF</th>
                                    <th>Morada</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if(count($clientes) > 0)
                                    {
                                        foreach ($clientes as $cliente)
                                        {
                                    ?>
                                        <tr>
                                            <td><?= $cliente->username ?></td>
                                            <td><?= $cliente->email ?></td>
                                            <td><?= $cliente->nif ?></td>
                                            <td><?= $cliente->morada . ' ' . $cliente->codigopostal . ' ' . $cliente->localidade ?></td>
                                            <td>
                                                <a href="./router.php?c=cliente&a=show&id=<?= $cliente->id ?>" class="btn btn-success">Detalhes</a>
                                                <a href="./router.php?c=cliente&a=edit&id=<?= $cliente->id ?>" class="btn btn-warning">Editar</a>
                                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete">Apagar</a>
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