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
                    <?= $empresa->codigopostal ?>, <?= $empresa->localidade ?> <br>
                    <?= $empresa->telefone ?> <br>
                    <?= $empresa->email?> <br>
                    <?= $empresa->nif ?>
                </div>
                <div class="col-md-6 col-12">
                    <b>Cliente:</b> <br>
                    <?= $fatura->cliente->username ?> <br>
                    <?= $fatura->cliente->morada ?> <br>
                    <?= $fatura->cliente->codigopostal ?>, <?= $fatura->cliente->localidade ?> <br>
                    <?= $fatura->cliente->nif ?>
                </div>
            </div>
            <div class="card-body" >
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>REF</th>
                            <th>Produto</th>
                            <th>Qtd</th>
                            <th>Preço un.</th>
                            <th>Taxa</th>
                            <th>Subtotal</th>
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
                                <td><?= $linhafatura->id?></td>
                                <td><?= $linhafatura->produto->descricao?></td>
                                <td><?= $linhafatura->quantidade ?></td>
                                <td><?= $linhafatura->valor ?></td>
                                <td><?= $linhafatura->taxa->valor ?>%</td>
                                <td><?= $linhafatura->valor * $linhafatura->quantidade?> €</td>
                                <td>
                                    <?php
                                    if ($fatura->estado->id == 1)
                                    {
                                        ?>
                                        <a href="./router.php?c=linhafatura&a=edit&idLinha=<?= $linhafatura->id ?>" class="btn btn-warning">Editar</a>
                                        <a href="./router.php?c=linhafatura&a=delete&id=<?= $linhafatura->id ?>" class="btn btn-danger">Apagar</a>
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
                            <td colspan="5"><strong>Sem Artigos</strong></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
                <?php
                    if($fatura->estado->id == 1)
                    {
                        ?>
                        <a class="btn btn-primary" href="./router.php?c=linhafatura&a=create&id=<?= $fatura->id ?>">Adicionar Artigo</a>
                        <?php
                    }
                        ?>
            </div>
        </div>
        <div class="container-fluid">
            <div class="text-right mx-5">
                <?php
                $subtotal = 0;
                $iva = 0;
                $total = 0;
                if(count($fatura->linhafatura) > 0){
                    foreach ($fatura->linhafatura as $linhafatura)
                    {
                        if($iva <= 0)
                            $iva = $linhafatura->taxa->valor;
                        $total_linha = $linhafatura->valor * $linhafatura->quantidade;
                        $subtotal += $total_linha;
                        $total += $total_linha + $total_linha * ($linhafatura->taxa->valor/100);
                    }
                }
                ?>
                Subtotal: <?= $subtotal ?> €<br>
                Taxa IVA: <?= $iva?> %<br>
                Total: <?= $total ?> €<br>
            </div>
        </div>
    </div>
</div>
