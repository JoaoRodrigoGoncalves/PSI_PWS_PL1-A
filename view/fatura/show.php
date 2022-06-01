<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $produto->descricao ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=produtos&a=index">Produtos</a></li>
                        <li class="breadcrumb-item active"><?= $produto->descricao ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        Ref: <?= $produto->id ?><br>
        Descrição: <?= $produto->descricao ?><br>
        Preço: <?= $produto->preco_unitario ?>€<br>
        Iva: <?= $produto->taxa->valor ?>%<br>
        Stock: <?= $produto->stock . $produto->unidade->unidade ?>
    </div>
</div>
