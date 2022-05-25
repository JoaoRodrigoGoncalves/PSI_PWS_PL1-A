<h1 class="display-1 text-center"><?= APP_NAME ?></h1>
<p class="lead text-center">Seja bem-vindo ao <?= APP_NAME ?>. Preencha os seguintes dados para poder começar a utilizar a aplicação!</p>
<hr>
<div class="container mb-5">
    <form action="./router.php?c=setup&a=store" method="post">
        <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <h1 class="display-4">Administrador</h1>
                    <div class="mb-2">
                        <label for="username">Nome de utilizador</label>
                        <input type="text" name="username" id="username"
                               class="form-control" maxlength="100"
                               required <?= (isset($admin->errors) || isset($empresa->errors) ? 'value="' . $admin->username . '"' : '') ?>>
                        <?php if(isset($admin->errors)) {?>
                        <div class="invalid-feedback"><?= $admin->errors->on('username') ?></div><?php } ?>
                    </div>
                    <div class="mb-2">
                        <label for="admin_email">Email</label>
                        <input type="email" name="admin_email" id="admin_email" class="form-control" maxlength="100" required <?= (isset($admin->errors) || isset($empresa->errors) ? 'value="' . $admin->email . '"' : '') ?>>
                        <?php if(isset($admin->errors)) {?>
                            <div class="invalid-feedback">
                                <?= $admin->errors->on('email') ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="mb-2">
                        <label for="password">Palavra-Passe</label>
                        <input type="password" name="password" id="password" class="form-control" maxlength="100" required>
                        <?php if(isset($admin->errors)) {?>
                            <div class="invalid-feedback">
                                <?= $admin->errors->on('password') ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="mb-2">
                        <label for="re_password">Repita a Palavra-Passe</label>
                        <input type="password" name="re_password" id="re_password" class="form-control" required maxlength="100">
                        <?php if(isset($admin->errors)) {?>
                            <div class="invalid-feedback">
                                <?= $admin->errors->on('password') ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="mb-2">
                        <label for="admin_telefone">Telefone</label>
                        <input type="number" name="admin_telefone" id="admin_telefone" class="form-control" required maxlength="9" <?= (isset($admin->errors) || isset($empresa->errors) ? 'value="' . $admin->telefone . '"' : '') ?>>
                        <?php if(isset($admin->errors)) {?>
                            <div class="invalid-feedback">
                                <?= $admin->errors->on('telefone') ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="mb-2">
                        <label for="admin_NIF">Número de Identificação Fiscal</label>
                        <input type="number" name="admin_NIF" id="admin_NIF" class="form-control" required maxlength="9" <?= (isset($admin->errors) || isset($empresa->errors) ? 'value="' . $admin->nif . '"' : '') ?>>
                        <?php if(isset($admin->errors)) {?>
                            <div class="invalid-feedback">
                                <?= $admin->errors->on('nif') ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="mb-2">
                        <label for="admin_morada">Morada</label>
                        <input type="text" name="admin_morada" id="admin_morada" class="form-control" required maxlength="100" <?= (isset($admin->errors) || isset($empresa->errors) ? 'value="' . $admin->morada . '"' : '') ?>>
                        <?php if(isset($admin->errors)) {?>
                            <div class="invalid-feedback">
                                <?= $admin->errors->on('morada') ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="mb-2">
                        <label for="admin_codigoPostal">Código Postal</label>
                        <input type="text" name="admin_codigoPostal" id="admin_codigoPostal" class="form-control" required maxlength="8" <?= (isset($admin->errors) || isset($empresa->errors) ? 'value="' . $admin->codigopostal . '"' : '') ?>>
                        <?php if(isset($admin->errors)) {?>
                            <div class="invalid-feedback">
                                <?= $admin->errors->on('admin_codigopostal') ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="mb-2">
                        <label for="admin_localidade">Localidade</label>
                        <input type="text" name="admin_localidade" id="admin_localidade" class="form-control" required maxlength="40" <?= (isset($admin->errors) || isset($empresa->errors) ? 'value="' . $admin->localidade . '"' : '') ?>>
                        <?php if(isset($admin->errors)) {?>
                            <div class="invalid-feedback">
                                <?= $admin->errors->on('localidade') ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <h1 class="display-4">Empresa</h1>
                    <div class="mb-2">
                        <label for="designacaoSocial">Designação Social da Empresa</label>
                        <input type="text" name="designacaoSocial" id="designacaoSocial" class="form-control" maxlength="100" required <?= (isset($admin->errors) || isset($empresa->errors) ? 'value="' . $empresa->designacaosocial . '"' : '') ?>>
                        <?php if(isset($empresa->errors)) {?>
                            <div class="invalid-feedback">
                                <?= $empresa->errors->on('designacaosocial') ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="mb-2">
                        <label for="capitalSocial">Capital Social</label>
                        <input type="text" name="capitalSocial" id="capitalSocial" class="form-control" required <?= (isset($admin->errors) || isset($empresa->errors) ? 'value="' . $empresa->capitalsocial . '"' : '') ?>>
                        <?php if(isset($empresa->errors)) {?>
                            <div class="invalid-feedback">
                                <?= $empresa->errors->on('capitalsocial') ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="mb-2">
                        <label for="company_email">Email</label>
                        <input type="email" name="company_email" id="company_email" class="form-control" maxlength="100" required <?= (isset($admin->errors) || isset($empresa->errors) ? 'value="' . $empresa->email . '"' : '') ?>>
                        <?php if(isset($empresa->errors)) {?>
                            <div class="invalid-feedback">
                                <?= $empresa->errors->on('email') ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="mb-2">
                        <label for="company_telefone">Telefone</label>
                        <input type="number" name="company_telefone" id="company_telefone" class="form-control" required maxlength="9" <?= (isset($admin->errors) || isset($empresa->errors) ? 'value="' . $empresa->telefone . '"' : '') ?>>
                        <?php if(isset($empresa->errors)) {?>
                            <div class="invalid-feedback">
                                <?= $empresa->errors->on('telefone') ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="mb-2">
                        <label for="company_NIF">Número de Identificação Fiscal</label>
                        <input type="number" name="company_NIF" id="company_NIF" class="form-control" required maxlength="9" <?= (isset($admin->errors) || isset($empresa->errors) ? 'value="' . $empresa->nif . '"' : '') ?>>
                        <?php if(isset($empresa->errors)) {?>
                            <div class="invalid-feedback">
                                <?= $empresa->errors->on('nif') ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="mb-2">
                        <label for="company_morada">Morada</label>
                        <input type="text" name="company_morada" id="company_morada" class="form-control" required maxlength="100" <?= (isset($admin->errors) || isset($empresa->errors) ? 'value="' . $empresa->morada . '"' : '') ?>>
                        <?php if(isset($empresa->errors)) {?>
                            <div class="invalid-feedback">
                                <?= $empresa->errors->on('morada') ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="mb-2">
                        <label for="company_codigoPostal">Código Postal</label>
                        <input type="text" name="company_codigoPostal" id="company_codigoPostal" class="form-control" required maxlength="8" <?= (isset($admin->errors) || isset($empresa->errors) ? 'value="' . $empresa->codigopostal . '"' : '') ?>>
                        <?php if(isset($empresa->errors)) {?>
                            <div class="invalid-feedback">
                                <?= $empresa->errors->on('codigopostal') ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="mb-2">
                        <label for="company_localidade">Localidade</label>
                        <input type="text" name="company_localidade" id="company_localidade" class="form-control" required maxlength="40" <?= (isset($admin->errors) || isset($empresa->errors) ? 'value="' . $empresa->localidade . '"' : '') ?>>
                        <?php if(isset($empresa->errors)) {?>
                            <div class="invalid-feedback">
                                <?= $empresa->errors->on('localidade') ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="submit" class="btn btn-success mt-2 w-100" value="Gravar">
            </div>
        </div>
    </form>
</div>