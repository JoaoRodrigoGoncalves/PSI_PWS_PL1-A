<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Faturas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item active">Faturas</li>
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
                                <a href="./router.php?c=fatura&a=create" class="btn btn-primary btn-sm">Registar Fatura</a>
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
                                        <th>Id</th>
                                        <th>Data da Fatura</th>
                                        <th>Observações</th>
                                        <th>Estado</th>
                                        <th>Cliente</th>
                                        <th>Funcionario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(count($faturas) > 0)
                                {
                                    foreach ($faturas as $fatura)
                                    {
                                        ?>
                                        <tr>
                                            <td><?= $fatura->id?></td>
                                            <td><?= $fatura->data ?></td>
                                            <td><?= $fatura->obvervacoes ?></td>
                                            <td><?= $fatura->estado ?></td>
                                            <td><?= $fatura->cliente ?></td>
                                            <td><?= $fatura->funcinario ?></td>
                                            <td>
                                                <a href="./router.php?c=fatura&a=show&id=<?= $fatura->id ?>" class="btn btn-success">Detalhes</a>
                                                <a href="./router.php?c=fatura&a=edit&id=<?= $fatura->id ?>" class="btn btn-warning">Editar</a>
                                                <a href="#" class="btn btn-danger">Apagar</a>
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