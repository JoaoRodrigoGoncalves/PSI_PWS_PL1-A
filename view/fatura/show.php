<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Fatura Nº<?= $fatura->id ?></h1>
                    <?php
                    if($fatura->estado->id == 1)
                    {
                        ?>
                        <span class="badge bg-warning"><?=$fatura->estado->estado?></span>
                        <?php
                    }
                    else  if($fatura->estado->id == 2)
                    {
                        ?>
                        <span class="badge bg-success"><?=$fatura->estado->estado?></span>
                        <?php
                    }
                    else  if($fatura->estado->id == 3)
                    {
                        ?>
                        <span class="badge bg-danger"><?=$fatura->estado->estado?></span>
                        <?php
                    }
                    ?>
                    <p>Data: <?=$fatura->data->format('d-m-Y')?></p>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=fatura&a=index">Faturas</a></li>
                        <li class="breadcrumb-item active">Fatura Nº<?= $fatura->id ?></li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-12">
                    <?= $empresa->designacaosocial ?><br>
                    <?= $empresa->morada ?><br>
                    <?= $empresa->codigopostal ?>, <?= $empresa->localidade ?><br>
                    NIF: <?= $empresa->nif ?><br>
                    Telefone: <?= $empresa->telefone ?><br>
                    Email: <?= $empresa->email?>
                </div>
                <div class="col-md-6 col-12">
                    <b>Cliente:</b> <br>
                    <?= $fatura->cliente->username ?> <br>
                    <?= $fatura->cliente->morada ?> <br>
                    <?= $fatura->cliente->codigopostal ?>, <?= $fatura->cliente->localidade ?> <br>
                    Nif: <?= $fatura->cliente->nif ?>
                </div>
            </div>
            <div class="card mt-3">
                    <div class="card-header">
                        <div class="card-tools">
                            <a class="btn btn-sencondary text-right" href="./router.php?c=fatura&a=pdf&id=<?= $fatura->id ?>">
                                <img src="./public/dist/img/pdf-icon.png" height="30">
                            </a>
                            <?php if(in_array($userRole, ['funcionario', 'administrador'])){ ?>
                                <?php if($fatura->estado->id == 1){ ?>
                                    <a class="btn btn-primary" href="./router.php?c=produto&a=select&callbackID=<?=$fatura->id?>&callbackRoute=linhafatura/create">Adicionar Artigo</a>
                                    <a class="btn btn-success" href="#" onclick="openModal('update', 'Tem a certeza que pretende finalizar a fatura?')">Finalizar</a>
                                    <a class="btn btn-danger" href="#" onclick="openModal('delete', 'Tem a certeza que pretende anular a fatura?')">Anular</a>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                <div class="card-body" >

                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th class="fit_column">Referência</th>
                            <th>Produto</th>
                            <th class="fit_column">Qtd</th>
                            <th class="fit_column">Preço un.</th>
                            <th class="fit_column">Taxa</th>
                            <th class="fit_column">Total Sem IVA</th>
                            <th class="fit_column"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(count($fatura->linhafatura) > 0)
                        {
                            foreach ($fatura->linhafatura as $linhafatura)
                            {
                                ?>
                                <tr>
                                    <td><?= $linhafatura->produto->id?></td>
                                    <td><?= $linhafatura->produto->descricao?></td>
                                    <td><?= $linhafatura->quantidade ?></td>
                                    <td><?= $linhafatura->valor ?>€</td>
                                    <td><?= $linhafatura->taxa->valor ?>%</td>
                                    <td><?= $linhafatura->valor * $linhafatura->quantidade?> €</td>
                                    <td>
                                        <?php
                                        if ($fatura->estado->id == 1)
                                        {
                                            ?>
                                            <a href="./router.php?c=linhafatura&a=edit&id=<?= $linhafatura->id ?>" class="btn btn-warning">Editar</a>
                                            <a href="./router.php?c=linhafatura&a=delete&idLinha=<?= $linhafatura->id ?>" class="btn btn-danger">Apagar</a>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            <tr>
                                <td colspan="4"></td>
                                <td><b>Total Líquido</b></td>
                                <td><?= $fatura->getSubtotal() ?>€</td>
                                <td><b>Incidência</b></td>
                            </tr>
                                <?= $fatura->taxBox(4) ?>
                            <tr>
                                <td colspan="4"></td>
                                <td><b>Total Bruto</b></td>
                                <td><?= round($fatura->getTotal(), 2) ?>€</td>
                                <td></td>
                            </tr>
                            <?php
                        }
                        else
                        {
                            ?>
                            <tr>
                                <td colspan="7"><strong>Sem Produtos a Listar</strong></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php

                    ?>
                </div>
            </div>
            <p>Fatura processada por <?= $fatura->funcionario->username ?></p>
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
    function openModal(action, question)
    {
        document.getElementById('modal_question').innerText = question;
        document.getElementById('modal_action_btn').setAttribute('href', './router.php?c=fatura&a=' + action + '&id=<?= $fatura->id ?>');

        new bootstrap.Modal(document.getElementById('modalAction'), {
            keyboard: true
        }).toggle();
    }
</script>