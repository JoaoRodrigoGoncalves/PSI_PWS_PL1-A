<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 class="m-2 display-4">Ocorreu um erro</h1>
                    <?php
                    if($callbackroute == null)
                    {
                        echo '<a href="./router.php?c=dashboard&a=index" class="btn btn-primary mt-3">Ir para o dashboard</a>';
                    }
                    else
                    {
                        echo '<a href="' . $callbackroute . '" class="btn btn-primary mt-3">Voltar</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>