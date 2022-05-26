<main class="d-flex flex-column h-100">
    <div class="flex-shrink-0">
        <div class="container my-5">
            <h1 class="text-center top-space display-4">Registar Clientes</h1>
            <h2 class="top-space"></h2> 
            <div class="form">   
                <form action="router.php?c=registo&a=store" method="post" class="needs-validation row justify-content-center">
                    <div class="col col-6">
                        <div class="mb-3">
                            <label for="username">Nome de utilizador</label>
                            <input type="text" name="username" id="username" class="form-control" maxlength="100" required <?= (isset($client->errors) ? 'value="' . $client->username . '"' : '') ?>>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
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
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>