<div class="container">
    <h1 class="m-2 display-4">Ocorreu um erro</h1>
    <?php
    if($callbackroute == null)
    {
        echo '<a href="./router.php?c=site&a=index" class="btn btn-primary mt-3">Ir para a página inicial</a>';
    }
    else
    {
        echo '<a href="' . $callbackroute . '" class="btn btn-primary mt-3">Voltar</a>';
    }
    ?>
</div>