<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Funcionários</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item active">Funcionarios</li>
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
                            <a href="./router.php?c=funcionario&a=create" class="btn btn-primary btn-sm">Registar Funcionario</a>
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
                                    <th>Estado</th>
                                    <th class="fit_column">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(count($funcionarios) > 0)
                                {
                                    foreach ($funcionarios as $funcionario)
                                    {
                                        ?>
                                        <tr>
                                            <td><?= $funcionario->username ?></td>
                                            <td><?= $funcionario->email ?></td>
                                            <td><?= $funcionario->nif ?></td>
                                            <td><?= $funcionario->ativo == 1 ? '<span class="badge bg-success">Ativo</span>': '<span class="badge bg-danger">Desativado</span>' ?></td>
                                            <td>
                                                <a href="./router.php?c=funcionario&a=show&id=<?= $funcionario->id ?>" class="btn btn-success">Detalhes</a>
                                                <a href="./router.php?c=funcionario&a=edit&id=<?= $funcionario->id ?>" class="btn btn-warning">Editar</a>
                                                <?php if($funcionario->ativo == 1){ ?>
                                                    <a href="#" class="btn btn-danger" onclick="deleteEntity(<?=  $funcionario->id ?>)">Desativar</a>
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

<!-- Modal -->
<div class="modal fade" id="modalDelete" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <p>Pretende mesmo apagar este Funcionário?</p>
            </div>
            <div class="modal-footer">
                <a href="#" id="modal_delete_btn" class="btn btn-danger">Apagar</a>
                <a href="#" class="btn btn-info" data-dismiss="modal">Cancelar</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function deleteEntity(id)
    {
        document.getElementById('modal_delete_btn').setAttribute('href', './router.php?c=funcionario&a=delete&id=' + id);

        new bootstrap.Modal(document.getElementById('modalDelete'), {
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