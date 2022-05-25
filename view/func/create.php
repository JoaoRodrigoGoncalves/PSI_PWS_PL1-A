<div class="container">
    <div class="form">
        <form action="router.php?c=func&a=store" method="post"
              class="needs-validation justify-content-center" novalidate>
            <div class="row mb-5">
                <h1 class="col-12 display-4 alert-primary p-2">Novo Funcionario</h1>
                <div class="col-6 mb-2">
                    <label for="username">Nome de utilizador</label>
                    <input type="text" name="username" id="username"
                           class="form-control" maxlength="100"
                           required <?= (isset($func->errors) ? 'value="' . $func->username . '"' : '') ?>>
                    <?php if(isset($func->errors)) {?>
                        <div class="invalid-feedback"><?= $func->errors->on('username') ?></div><?php } ?>
                </div>
                <div class="col-6 mb-2">
                    <label for="func_email">Email</label>
                    <input type="email" name="func_email" id="func_email" class="form-control" maxlength="100" required <?= (isset($func->errors)) ? 'value="' . $func->email . '"' : '' ?>>
                    <?php if(isset($func->errors)) {?>
                        <div class="invalid-feedback">
                            <?= $func->errors->on('email') ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-6 mb-2">
                    <label for="func_telefone">Telefone</label>
                    <input type="number" name="func_telefone" id="func_telefone" class="form-control" required maxlength="9" <?= (isset($func->errors) ) ? 'value="' . $func->telefone . '"' : '' ?>>
                    <?php if(isset($func->errors)) {?>
                        <div class="invalid-feedback">
                            <?= $func->errors->on('telefone') ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-6 mb-2">
                    <label for="func_NIF">Número de Identificação Fiscal</label>
                    <input type="number" name="func_NIF" id="func_NIF" class="form-control" required maxlength="9" <?= (isset($func->errors) ) ? 'value="' . $func->nif . '"' : '' ?>>
                    <?php if(isset($func->errors)) {?>
                        <div class="invalid-feedback">
                            <?= $func->errors->on('nif') ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-4 mb-2">
                    <label for="func_morada">Morada</label>
                    <input type="text" name="func_morada" id="func_morada" class="form-control" required maxlength="100" <?= (isset($func->errors) ) ? 'value="' . $func->morada . '"' : '' ?>>
                    <?php if(isset($func->errors)) {?>
                        <div class="invalid-feedback">
                            <?= $func->errors->on('morada') ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-4 mb-2">
                    <label for="func_codigoPostal">Código Postal</label>
                    <input type="text" name="func_codigoPostal" id="func_codigoPostal" class="form-control" required maxlength="8" <?= (isset($func->errors) ) ? 'value="' . $func->codigopostal . '"' : '' ?>>
                    <?php if(isset($func->errors)) {?>
                        <div class="invalid-feedback">
                            <?= $func->errors->on('func_codigopostal') ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-4 mb-2">
                    <label for="func_localidade">Localidade</label>
                    <input type="text" name="func_localidade" id="func_localidade"
                           class="form-control" required maxlength="40"
                        <?= (isset($func->errors) ) ? 'value="' . $func->localidade . '"' : '' ?>>
                    <?php if(isset($func->errors)) {?>
                        <div class="invalid-feedback">
                            <?= $func->errors->on('localidade') ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-6 mb-2">
                    <label for="password">Palavra-Passe</label>
                    <input type="password" name="password" id="password" class="form-control" maxlength="100" required>
                    <?php if(isset($func->errors)) {?>
                        <div class="invalid-feedback">
                            <?= $func->errors->on('password') ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-6 mb-2">
                    <label for="re_password">Repita a Palavra-Passe</label>
                    <input type="password" name="re_password" id="re_password" class="form-control" required maxlength="100">
                    <?php if(isset($func->errors)) {?>
                        <div class="invalid-feedback">
                            <?= $func->errors->on('password') ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-12 mb-2">
                    <input type="submit" class="btn btn-success mt-2 w-100" value="Gravar">
                </div>
            </div>
        </form>
    </div>
</div>
