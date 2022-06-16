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
                            <?php if(in_array($userRole, ['funcionario', 'administrador'])){ ?>
                                <a href="./router.php?c=cliente&a=select" class="btn btn-primary btn-sm">Registar Fatura</a>
                            <?php } ?>
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
                                            <td><?= round($fatura->getTotal(), 2) ?>€</td>
                                            <td>
                                                <a href="./router.php?c=fatura&a=show&id=<?= $fatura->id ?>" class="btn btn-primary">Detalhes</a>
                                                <?php if(in_array($userRole, ['funcionario', 'administrador'])){ ?>
                                                    <?php if ($fatura->estado->id == 1){ ?>
                                                        <?php if(count($fatura->linhafatura) > 0){ ?>
                                                            <a href="#" class="btn btn-success" onclick="openModal('update', 'Tem a certeza que pretende finalizar a fatura?', <?= $fatura->id ?>)">Finalizar</a>
                                                        <?php } ?>
                                                        <a href="#" class="btn btn-danger" onclick="openModal('delete', 'Tem a certeza que pretende anular a fatura?', <?= $fatura->id ?>)">Anular</a>
                                                    <?php } ?>
                                                <?php } ?>
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

<!-- Modals Finalizar / Anular -->
<div class="modal fade" id="modalAction" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <p id="modal_question">&nbsp;</p>
            </div>
            <div class="modal-footer">
                <a href="#" id="modal_action_btn" class="btn btn-primary">Sim</a>
                <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function openModal(action, question, id)
    {
        document.getElementById('modal_question').innerText = question;
        document.getElementById('modal_action_btn').setAttribute('href', './router.php?c=fatura&a=' + action + '&id=' + id);

        new bootstrap.Modal(document.getElementById('modalAction'), {
            keyboard: true
        }).toggle();
    }
</script>
<script type="text/javascript" src="./public/dist/js/faturamais_bo.js"></script>
<?php if(isset($_GET['success'])){ ?>
    <script type="text/javascript">
        window.onload = function() { alert_success(); }
    </script>
<?php } ?>