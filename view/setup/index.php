<h1 class="display-1 text-center"><?= APP_NAME ?></h1>
<p class="lead text-center">Seja bem-vindo ao <?= APP_NAME ?>. Preencha os seguintes dados para poder começar a utilizar a aplicação!</p>
<hr>
<div class="container">
    <form action="./router.php?c=setup&a=store" method="post">
        <div class="row">
                <div class="col-6">
                    <h1 class="display-4">Administrador</h1>
                    <label for="username">Nome de utilizador</label>
                    <input type="text" name="username" id="username" class="form-control" maxlength="100" required>
                </div>
                <div class="col-6">
                    <h1 class="display-4">Empresa</h1>
                    <label for="designacaoSocial">Designação Social da Empresa</label>
                    <input type="text" name="designacaoSocial" id="designacaoSocial" class="form-control" maxlength="100" required>
                </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="admin_email">Email</label>
                <input type="email" name="admin_email" id="admin_email" class="form-control" maxlength="100" required>
            </div>
            <div class="col-6">
                <label for="capitalSocial">Capital Social</label>
                <input type="text" name="capitalSocial" id="capitalSocial" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="password">Palavra-Passe</label>
                <input type="password" name="password" id="password" class="form-control" maxlength="100" required>

            </div>
            <div class="col-6">
                <label for="company_email">Email</label>
                <input type="email" name="company_email" id="company_email" class="form-control" maxlength="100" required>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="re_password">Repita a Palavra-Passe</label>
                <input type="password" name="re_password" id="re_password" class="form-control" required maxlength="100">
            </div>
            <div class="col-6">
                <label for="company_telefone">Telefone</label>
                <input type="number" name="company_telefone" id="company_telefone" class="form-control" required maxlength="9">
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="admin_telefone">Telefone</label>
                <input type="number" name="admin_telefone" id="admin_telefone" class="form-control" required maxlength="9">
            </div>
            <div class="col-6">
                <label for="company_NIF">Número de Identificação Fiscal</label>
                <input type="number" name="company_NIF" id="company_NIF" class="form-control" required maxlength="9">
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="admin_NIF">Número de Identificação Fiscal</label>
                <input type="number" name="admin_NIF" id="admin_NIF" class="form-control" required maxlength="9">
            </div>
            <div class="col-6">
                <label for="company_morada">Morada</label>
                <input type="text" name="company_morada" id="company_morada" class="form-control" required maxlength="100">
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="admin_morada">Morada</label>
                <input type="text" name="admin_morada" id="admin_morada" class="form-control" required maxlength="100">
            </div>
            <div class="col-6">
                <label for="company_codigoPostal">Código Postal</label>
                <input type="text" name="company_codigoPostal" id="company_codigoPostal" class="form-control" required maxlength="8">
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="admin_codigoPostal">Código Postal</label>
                <input type="text" name="admin_codigoPostal" id="admin_codigoPostal" class="form-control" required maxlength="8">
            </div>
            <div class="col-6">
                <label for="company_localidade">Localidade</label>
                <input type="text" name="company_localidade" id="company_localidade" class="form-control" required maxlength="40">
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="admin_localidade">Localidade</label>
                <input type="text" name="admin_localidade" id="admin_localidade" class="form-control" required maxlength="40">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="submit" class="btn btn-success mt-2 w-100" value="Gravar">
            </div>
        </div>
    </form>
</div>