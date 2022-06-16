<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Unidades</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item active">Unidades</li>
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
                            <a href="./router.php?c=unidade&a=create" class="btn btn-primary btn-sm">Criar Unidade</a>
                            <div class="card-tools">
                                <div class="card-tools">
                                    <form action="router.php?c=unidade&a=index" method="post" class="input-group input-group-sm">
                                        <a class="pt-1 mx-2" href="./router.php?c=unidade&a=index">Clear Filter</a>
                                        <select id="filter_type" class="form-control" name="filter_type">
                                            <option value="unidade">Unidade</option>
                                        </select>
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Procurar">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Unidade</th>
                                    <th class="fit_column">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(count($unidades) > 0)
                                {
                                    foreach ($unidades as $unidade)
                                    {
                                        ?>
                                        <tr>
                                            <td><?= $unidade->unidade ?></td>
                                            <td>
                                                <a href="router.php?c=unidade&a=edit&id=<?= $unidade->id ?>" class="btn btn-warning">Editar</a>
                                                <a href="#" class="btn btn-danger" onclick="deleteEntity(<?= $unidade->id ?>)">Apagar</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <tr>
                                        <td colspan="2"><strong>Sem dados a mostrar</strong></td>
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
                <p>Pretende mesmo apagar esta Unidade?</p>
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
        document.getElementById('modal_delete_btn').setAttribute('href', './router.php?c=unidade&a=delete&id=' + id);

        new bootstrap.Modal(document.getElementById('modalDelete'), {
            keyboard: true
        }).toggle();
    }
</script>
<script type="text/javascript" src="./public/dist/js/faturamais_bo.js"></script>
<?php if(isset($_GET['success'])){ ?>
        <?php if($_GET['success'] == 1) { ?>
            <script type="text/javascript">
                window.onload = function() { alert_success(); }
            </script>
        <?php } else { ?>
            <script type="text/javascript">
                window.onload = function() { alert_fail("Não foi possivel apagar porque a unidade se encontra em utilização."); }
            </script>
        <?php } ?>
<?php } ?>