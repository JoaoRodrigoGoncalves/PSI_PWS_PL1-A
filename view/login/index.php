<?php require_once './view/layout/header.php'?>
<div class="container">
    <div class="row justify-content-center">
        <div class="d-none d-sm-block col-sm-2"></div>
        <div class="col-12 col-sm-6">
            <div class="mt-5">
                <h1 class="display-4">Iniciar Sessão</h1>
                <?php

                if(isset($fail))
                {
                ?>
                    <div class="alert alert-danger" role="alert">
                        Credenciais Incorretas!
                    </div>
                <?php
                }

                ?>
                <form action="./router.php?c=login&a=login" method="POST">
                    <label for="input_email">Email:</label>
                    <input class="form-control" type="email" name="email" id="input_email" placeholder="example@email.com" required>

                    <div class="mt-4"></div>

                    <label for="input_password">Palavra-passe:</label>
                    <input class="form-control" type="password" name="password" id="input_password" required>

                    <input class="btn btn-primary mt-3 w-100" type="submit" value="Iniciar Sessão">
                </form>
            </div>
        </div>
        <div class="d-none d-sm-block col-sm-2"></div>
    </div>
</div>
<?php require_once './view/layout/footer.php'?>