<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Criar Unidade</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=unidade&a=index">Unidades</a></li>
                        <li class="breadcrumb-item active">Criar Unidade</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col">
                    <form action="./router.php?c=unidade&a=store" method="post">
                        <label for="unidade">Unidade</label>
                        <input type="text" id="unidade" name="unidade" class="form-control">
                        <input type="submit" class="btn btn-primary mt-2" value="Guardar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>