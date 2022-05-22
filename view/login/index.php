<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
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
                    <div class="">
                        <label for="input_email">Email:</label>
                        <input class="form-control" type="email" name="email" id="input_email" placeholder="example@email.com" required>
                    </div>
                    <div class="mt-4">
                        <label for="input_password">Palavra-passe:</label>
                        <input class="form-control" type="password" name="password" id="input_password" required>
                    </div>
                    <input class="btn btn-primary mt-3 w-100" type="submit" value="Iniciar Sessão">
                </form>
            </div>
        </div>
    </div>
</div>
