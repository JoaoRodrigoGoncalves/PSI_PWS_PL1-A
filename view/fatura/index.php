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
                                        <th class="fit_column">Nº</th>
                                        <th class="fit_column">Data da Fatura</th>
                                        <th class="fit_column">Estado</th>
                                        <th>Cliente</th>
                                        <th class="fit_column">Funcionario</th>
                                        <th class="fit_column">Total</th>
                                        <th class="fit_column">&nbsp;</th>
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
                                            <td><?= $fatura->data->format('d-m-Y') ?></td>
                                            <td>
                                                <?php
                                                switch ($fatura->estado->id)
                                                {
                                                    case 1:
                                                        echo '<span class="badge bg-warning">'.$fatura->estado->estado.'</span>';
                                                        break;
                                                    case 2:
                                                        echo '<span class="badge bg-success">'.$fatura->estado->estado.'</span>';
                                                        break;
                                                    case 3:
                                                        echo '<span class="badge bg-danger">'.$fatura->estado->estado.'</span>';
                                                        break;
                                                }
                                                ?>
                                            </td>
                                            <td><?= $fatura->cliente->username ?></td>
                                            <td><?= $fatura->funcionario->username ?></td>
                                            <td><?= $fatura->getTotal() ?>€</td>
                                            <td>
                                                <a href="./router.php?c=fatura&a=show&id=<?= $fatura->id ?>" class="btn btn-primary">Detalhes</a>
                                                <?php
                                                if ($fatura->estado->id == 1)
                                                {
                                                ?>
                                                    <a href="./router.php?c=fatura&a=update&id=<?= $fatura->id ?>" class="btn btn-success">Finalizar</a>
                                                    <a href="./router.php?c=fatura&a=delete&id=<?= $fatura->id ?>" class="btn btn-danger">Cancelar</a>
                                                <?php
                                                }
                                                ?>
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