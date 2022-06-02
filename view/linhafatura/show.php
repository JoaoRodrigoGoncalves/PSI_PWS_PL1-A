<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Fatura Nº<?= $linhaFatura->fatura->id ?></h1>
                    <h2 class="m-0">Linha de fatura Nº<?= $linhaFatura->id ?></h2>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=fatura&a=index">Faturas</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=fatura&a=show&id=<?= $linhaFatura->fatura->id ?>"><?= $linhaFatura->fatura->id ?></a></li>
                        <li class="breadcrumb-item active"><?= $linhaFatura->id ?></li>
                    </ol>
                </div><!-- /.col -->
                <div class="col-12">
                    <p>Data: <?=$linhaFatura->data->format('d-m-Y')?></p>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- TODO Finish -->
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-12">
                    Empresa: <?= $empresa->designacaosocial ?><br>
                    Morada: <?= $empresa->morada ?><br>
                    Codigo Postal: <?= $empresa->codigopostal ?>, <?= $empresa->localidade ?> <br>
                    Contacto: <?= $empresa->telefone ?> <br>
                    Email: <?= $empresa->email?> <br>
                    Nif: <?= $empresa->nif ?>
                </div>
                <div class="col-md-6 col-12">
                    <b>Cliente:</b> <br>
                    <?= $linhaFatura->cliente->username ?> <br>
                    Morada: <?= $linhaFatura->cliente->morada ?> <br>
                    Codigo Postal: <?= $linhaFatura->cliente->codigopostal ?>, <?= $linhaFatura->cliente->localidade ?> <br>
                    Nif: <?= $linhaFatura->cliente->nif ?>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>REF</th>
                        <th>Qtd</th>
                        <th>Preço un.</th>
                        <th>IVA</th>
                        <th>Taxa</th>
                        <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(count($linhaFatura->linhafaturas) > 0)
                    {
                        foreach ($linhaFatura->linhafaturas as $linhafatura)
                        {
                            ?>
                            <tr>
                                <td><?= $linhafatura->id?></td>
                                <td><?= $linhafatura->quantidade ?></td>
                                <td><?= $linhafatura->valor ?></td>
                                <td><?= $linhafatura->iva->descricao ?></td>
                                <td>%<?= $linhafatura->iva->valor ?></td>
                                <rd><?= $linhafatura->valor * $linhafatura->quantidade?></rd>
                                <td>
                                    <a href="./router.php?c=linhafatura&a=show&id=<?= $linhaFatura->id ?>" class="btn btn-success">Detalhes</a>
                                    <?php
                                    if ($linhaFatura->estado != "Fechado")
                                    {
                                        ?>
                                        <a href="./router.php?c=linhafatura&a=edit&id=<?= $linhaFatura->id ?>" class="btn btn-warning">Editar</a>
                                        <a href="./router.php?c=linhafatura&a=delete&id=<?= $linhaFatura->id ?>" class="btn btn-danger">Apagar</a>
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
                            <td colspan="5"><strong>Sem faturas</strong></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
                <?php

                ?>
                <div class="align-content-end">
                    Subtotal:
                </div>
            </div>
        </div>
    </div>
</div>
