<main class="d-flex flex-column h-100">
    <div class="flex-shrink-0">
        <div class="container my-5">
            <h1 class="text-center top-space display-4">Editar Clientes</h1> 
            <h2 class="top-space"></h2> 
            <div class="form"> 
                <form action="router.php?c=registo&a=update&id=<?=$clientes->id?>" method="post" class="needs-validation row justify-content-center" novalidate>
                    <div class="col col-6">
                        <div class="mb-3">
                            <label for="username" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?=$clientes->username?>"/>
                        </div>
                        <div class="mb-3">
                            <label for="client_email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?=$clientes->email?>">
                        </div>
                        <div class="mb-3">
                            <label for="client_telefone" class="form-label">Telefone:</label>
                            <input type="number" class="form-control" id="telefone" name="telefone" value="<?=$clientes->telefone?>">
                        </div>
                        <div class="mb-3">
                            <label for="client_nif" class="form-label">Nif:</label>
                            <input type="number" class="form-control" id="nif" name="nif" value="<?=$clientes->nif?>">
                        </div>
                        <div class="mb-3">
                            <label for="client_morada" class="form-label">Morada:</label>
                            <input type="text" class="form-control" id="morada" name="morada" value="<?=$clientes->morada?>">
                        </div>
                        <div class="mb-3">
                            <label for="client_codigopostal" class="form-label">Código-Postal:</label>
                            <input type="text" class="form-control" id="codigopostal" name="codigopostal" value="<?=$clientes->codigopostal?>">
                        </div>
                        <div class="mb-3">
                            <label for="client_localidade" class="form-label">Localidade:</label>
                            <input type="text" class="form-control" id="localidade" name="localidade" value="<?=$clientes->localidade?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>