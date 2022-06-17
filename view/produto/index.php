<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Produtos</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item active">Produtos</li>
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
                            <?php if($allowRegister) { ?>
                                <a href="./router.php?c=produto&a=create" class="btn btn-primary btn-sm">Registar Produto</a>
                            <?php } else { ?>
                                <span class="d-inline-block" data-toggle="tooltip" data-placement="bottom" title="Crie e/ou ative Taxas e Unidades primeiro">
                                    <a href="#" class="btn btn-primary btn-sm disabled">Registar Produto</a>
                                </span>
                            <?php } ?>
                            <div class="card-tools">
                                <form action="./router.php?c=produto&a=index" method="post" class="input-group input-group-sm">
                                    <a class="pt-1 mx-2" href="./router.php?c=produto&a=index">Limpar Filtro</a>
                                    <select id="filter_type" class="form-control" name="filter_type">
                                        <option value="descricao">Descrição</option>
                                        <option value="stock">Stock</option>
                                        <option value="unidade">Unidade</option>
                                        <option value="preco_unitario">Preço Unitario</option>
                                        <option value="taxa">Taxa</option>
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
                        <div class="card-body">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th class="fit_column">Estado</th>
                                    <th>Descrição</th>
                                    <th class="fit_column">Stock</th>
                                    <th class="fit_column">Unidade</th>
                                    <th class="fit_column">Preço</th>
                                    <th class="fit_column">Taxa</th>
                                    <th class="fit_column">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(count($produtos) > 0)
                                {
                                    foreach ($produtos as $produto)
                                    {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php if($produto->ativo == 1){ ?>
                                                    <span class="badge bg-success">Ativo</span>
                                                <?php } else { ?>
                                                    <span class="badge bg-danger">Desativado</span>
                                                <?php } ?>
                                            </td>
                                            <td><?= $produto->descricao ?></td>
                                            <td><?= $produto->stock ?></td>
                                            <td><?= $produto->unidade->unidade ?></td>
                                            <td><?= $produto->preco_unitario ?>€/<?= $produto->unidade->unidade ?></td>
                                            <td><?= $produto->taxa->valor ?>%</td>
                                            <td>
                                                <a href="./router.php?c=produto&a=show&id=<?= $produto->id ?>" class="btn btn-success">Detalhes</a>
                                                <a href="./router.php?c=produto&a=edit&id=<?= $produto->id ?>" class="btn btn-warning">Editar</a>
                                                <?php if($produto->ativo == 1){ ?>
                                                    <a href="#" class="btn btn-danger" onclick="deleteEntity(<?= $produto->id ?>, '<?= $produto->descricao ?>')">Desativar</a>
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
                <p>Pretende mesmo apagar <span id="entity_name"></span>?</p>
            </div>
            <div class="modal-footer">
                <a href="#" id="modal_delete_btn" class="btn btn-danger">Apagar</a>
                <a href="#" class="btn btn-info" data-dismiss="modal">Cancelar</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function deleteEntity(id, name)
    {
        document.getElementById('modal_delete_btn').setAttribute('href', './router.php?c=produto&a=delete&id=' + id);
        document.getElementById('entity_name').textContent = '"' + name + '"';

        new bootstrap.Modal(document.getElementById('modalDelete'), {
            keyboard: true
        }).toggle();
    }
</script>

<?php if(isset($_GET['success'])){ ?>
    <script type="text/javascript">
        window.onload = function() { alert_success(); }
    </script>
<?php } ?>