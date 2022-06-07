<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editar Taxa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=taxa&a=index">Taxas</a></li>
                        <li class="breadcrumb-item active">Editar Taxa</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="form">
                <form action="router.php?c=taxa&a=update&id=<?=$taxas->id?>" method="post" class="needs-validation row justify-content-center" novalidate>
                    <div class="col col-6">
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="emvigor" name="emvigor" <?=$taxas->emvigor == 1 ? 'checked' : '' ?>/>
                            <label for="emvigor" class="form-check-label"> Ativo</label><br>
                        </div>
                        <div class="mb-3">
                            <label for="inputValor" class="form-label">Valor:</label>
                            <input type="number" class="form-control" id="valor" name="valor" value="<?=$taxas->valor?>"/>
                        </div>
                        <div class="mb-3">
                            <label for="inputDescricao" class="form-label">Descrição:</label>
                            <input type="text" class="form-control" id="descricao" name="descricao" value="<?=$taxas->descricao?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>