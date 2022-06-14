<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Criar Taxa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=taxa&a=index">Taxas</a></li>
                        <li class="breadcrumb-item active">Criar Taxa</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="form">
                <form action="router.php?c=taxa&a=store" method="post" class="needs-validation row justify-content-center">
                    <div class="col col-6">
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="emvigor" name="emvigor"/>
                            <label for="emvigor" class="form-check-label"> Ativo</label><br>
                        </div>
                        <div class="mb-3">
                            <label for="inputValor" class="form-label">Valor:</label>
                            <input type="number" class="form-control" id="valor" name="valor" required value="<?= $taxa->valor ?>"/>
                            <?php if($taxa -> errors && $taxa -> errors -> is_invalid('valor')){ ?>
                                <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $taxa->errors->on('valor') ?></span>
                            <?php } ?> 
                        </div>
                        <div class="mb-3">
                            <label for="inputDescicao" class="form-label">Descrição:</label>
                            <input type="text" class="form-control" id="descricao" name="descricao" required value="<?= $taxa->descricao ?>">
                            <?php if($taxa -> errors && $taxa -> errors -> is_invalid('descricao')){ ?>
                                <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $taxa->errors->on('descricao') ?></span>
                            <?php } ?> 
                        </div>
                        <button type="submit" class="btn btn-primary">Registar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>