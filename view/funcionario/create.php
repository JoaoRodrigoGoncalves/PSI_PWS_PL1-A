<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registar Funcionário</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=funcionario&a=index">Funcionarios</a></li>
                        <li class="breadcrumb-item active">Registar Funcionario</li>
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
                    <form action="router.php?c=funcionario&a=store" method="post" class="needs-validation justify-content-center" novalidate>
                        <div class="row mb-5">
                            <div class="col-6 mb-2">
                                <label for="username">Nome de utilizador</label>
                                <input type="text" name="username" id="username"
                                       class="form-control" maxlength="100"
                                       required <?= (isset($func->errors) ? 'value="' . $func->username . '"' : '') ?>>
                            </div>
                            <div class="col-6 mb-2">
                                <label for="func_email">Email</label>
                                <input type="email" name="func_email" id="func_email"
                                       class="form-control" maxlength="100"
                                       required <?= (isset($func->errors)) ? 'value="' . $func->email . '"' : '' ?>>
                            </div>
                            <div class="col-6 mb-2">
                                <label for="func_telefone">Telefone</label>
                                <input type="number" name="func_telefone" id="func_telefone"
                                       class="form-control" required maxlength="9"
                                    <?= (isset($func->errors) ) ? 'value="' . $func->telefone . '"' : '' ?>>
                            </div>
                            <div class="col-6 mb-2">
                                <label for="func_NIF">Número de Identificação Fiscal</label>
                                <input type="number" name="func_NIF" id="func_NIF"
                                       class="form-control" required maxlength="9"
                                    <?= (isset($func->errors) ) ? 'value="' . $func->nif . '"' : '' ?>>
                            </div>
                            <div class="col-4 mb-2">
                                <label for="func_morada">Morada</label>
                                <input type="text" name="func_morada" id="func_morada" class="form-control" required maxlength="100" <?= (isset($func->errors) ) ? 'value="' . $func->morada . '"' : '' ?>>
                            </div>
                            <div class="col-4 mb-2">
                                <label for="func_codigoPostal">Código Postal</label>
                                <input type="text" name="func_codigoPostal" id="func_codigoPostal" class="form-control" required maxlength="8" <?= (isset($func->errors) ) ? 'value="' . $func->codigopostal . '"' : '' ?>>
                            </div>
                            <div class="col-4 mb-2">
                                <label for="func_localidade">Localidade</label>
                                <input type="text" name="func_localidade" id="func_localidade"
                                       class="form-control" required maxlength="40"
                                    <?= (isset($func->errors) ) ? 'value="' . $func->localidade . '"' : '' ?>>
                            </div>
                            <div class="col-12 mb-2">
                                <input type="submit" class="btn btn-success mt-2 w-100" value="Gravar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>