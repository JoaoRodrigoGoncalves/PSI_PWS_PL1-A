<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Fatura+</title>
        <link rel="icon" href="./public/dist/img/FaturaMaisLogo.png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="./public/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="./public/dist/css/adminlte.min.css">
    </head>
    <body>
        <section class="content">
            <div class="error-page">
                <h2 class="headline text-danger">?!?</h2>
                <div class="error-content pt-3">
                    <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Algo de errado não está certo.</h3>
                    <p>
                        Um erro ocorreu e não foi possível processar o seu pedido.
                        <?php if($callbackroute == null){ ?>
                            <a href="./router.php">Voltar ao Inicio</a>
                        <?php } else {?>
                            Tente <a href="<?= $callbackroute ?>">Voltar Atrás</a> or <a href="./router.php">Ir para o Inicio</a>.
                        <?php } ?>
                    </p>
                </div>
            </div>
        </section>
        <script src="./public/plugins/jquery/jquery.min.js"></script>
        <script src="./public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="./public/dist/js/adminlte.min.js"></script>
    </body>
</html>