<div class="container">
    <div class="form">
        <form action="router.php?c=funcionario&a=update&id=<?=$func->id?>" method="post"
              class="needs-validation justify-content-center" novalidate>
            <div class="row mb-5">
                <h1 class="col-12 display-4 alert-primary p-2">Editar Funcionario</h1>
                <div class="col-5 mb-2">
                    <label for="username">Nome de utilizador</label>
                    <input type="text" name="username" id="username"
                           class="form-control" maxlength="100"
                           required value="<?=$func->username?>">
                </div>
                <div class="col-5 mb-2">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email"
                           class="form-control" maxlength="100"
                           required value="<?=$func->email?>">
                </div>
                <div class="col-2 form-check form-switch">
                    <input class="form-check-input" type="checkbox"
                           id="flexSwitchCheckChecked" name="ativo"
                        <?=$func->ativo ? 'checked' : ''?>>
                    <label class="form-check-label" for="flexSwitchCheckChecked">Ativo</label>
                </div>
                <div class="col-6 mb-2">
                    <label for="telefone">Telefone</label>
                    <input type="number" name="telefone" id="telefone"
                           class="form-control" required maxlength="9"
                           value="<?=$func->telefone?>">
                </div>
                <div class="col-6 mb-2">
                    <label for="NIF">Número de Identificação Fiscal</label>
                    <input type="number" name="nif" id="NIF"
                           class="form-control" required maxlength="9"
                           value="<?=$func->nif?>">
                </div>
                <div class="col-4 mb-2">
                    <label for="morada">Morada</label>
                    <input type="text" name="morada" id="morada"
                           class="form-control" required maxlength="100"
                            value="<?=$func->morada?>" >
                </div>
                <div class="col-4 mb-2">
                    <label for="codigoPostal">Código Postal</label>
                    <input type="text" name="codigopostal" id="codigoPostal"
                           class="form-control" required maxlength="8"
                           value="<?=$func->codigopostal?>">
                </div>
                <div class="col-4 mb-2">
                    <label for="localidade">Localidade</label>
                    <input type="text" name="localidade" id="localidade"
                           class="form-control" required maxlength="40"
                           value="<?=$func->localidade?>">
                </div>
                <div class="col-12 mb-2">
                    <input type="submit" class="btn btn-success mt-2 w-100" value="Gravar">
                </div>
            </div>
        </form>
    </div>
</div>
