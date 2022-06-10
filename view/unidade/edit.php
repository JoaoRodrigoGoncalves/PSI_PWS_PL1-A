<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editar Unidade</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=unidade&a=index">Unidades</a></li>
                        <li class="breadcrumb-item active">Editar Unidade</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="form">
                <form action="router.php?c=unidade&a=update&id=<?=$unidade->id?>" method="post" class="needs-validation row justify-content-center" novalidate>
                    <div class="col col-6">
                        <div class="mb-3">
                            <label for="inputUnidade" class="form-label">Unidade:</label>
                            <input type="text" class="form-control" id="unidade" name="unidade" value="<?=$unidade->unidade?>"/>
                            <?php if($unidade -> errors && $unidade -> errors -> is_invalid('unidade')){ ?>
                                <span class="alert alert-danger alert-dismissible fade show" style="display: inherit; margin-top: 7px;" role="alert"><?= $unidade->errors->on('unidade') ?></span>
                            <?php } ?>  
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button> 
                        <a href="./router.php?c=unidade&a=index" class="btn btn-danger">Cancelar</a>  
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>