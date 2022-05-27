<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registar Cliente</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item"><a href="./router.php?c=cliente&a=index">Clientes</a></li>
                        <li class="breadcrumb-item active">Registar Cliente</li>
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
                    <form action="router.php?c=cliente&a=store" method="post" class="needs-validation row justify-content-center">
                        <div class="col col-6">
                            <div class="mb-3">
                                <label for="username">Nome</label>
                                <input type="text" name="username" id="username" class="form-control" maxlength="100" required <?= (isset($client->errors) ? 'value="' . $client->username . '"' : '') ?>>
                            </div>
                            <div class="mb-3">
                                <label for="email">Endereço de Correio Eletrónico</label>
                                <input type="email" name="email" id="email" class="form-control" maxlength="100" required <?= (isset($client->errors) ? 'value="' . $client->email . '"' : '') ?>>
                            </div>
                            <div class="mb-3">
                                <label for="telefone">Telefone</label>
                                <input type="number" name="telefone" id="telefone" class="form-control" required maxlength="9" <?= (isset($client->errors) ? 'value="' . $client->telefone . '"' : '') ?>>
                            </div>
                            <div class="mb-3">
                                <label for="nif">Número de Identificação Fiscal</label>
                                <input type="number" name="nif" id="nif" class="form-control" required maxlength="9" <?= (isset($client->errors) ? 'value="' . $client->nif . '"' : '') ?>>
                            </div>
                            <div class="mb-3">
                                <label for="morada">Morada</label>
                                <input type="text" name="morada" id="morada" class="form-control" required maxlength="100" <?= (isset($client->errors) ? 'value="' . $client->morada . '"' : '') ?>>
                            </div>
                            <div class="mb-3">
                                <label for="codigopostal">Código Postal</label>
                                <input type="text" name="codigopostal" id="codigopostal" class="form-control" required maxlength="8" <?= (isset($client->errors) ? 'value="' . $client->codigopostal . '"' : '') ?>>
                            </div>
                            <div class="mb-3">
                                <label for="localidade">Localidade</label>
                                <input type="text" name="localidade" id="localidade" class="form-control" required maxlength="40" <?= (isset($client->errors) ? 'value="' . $client->localidade . '"' : '') ?>>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Gravar">
                            <a href="./router.php?c=cliente&a=index" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
