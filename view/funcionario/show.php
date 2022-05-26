<div class="container">
    <div class="container">
        <div class="alert-primary align-items-center" style="display: flex">
            <h1 class="p-2"><?=$func->username?></h1>
            <div class="mx-2">
                <a href="router.php?c=funcionario&a=edit&id=<?=$func->id ?>" class="btn btn-info" role="button">Edit</a>
            </div>
            <div class="mx-2">
                <a href="router.php?c=funcionario&a=delete&id=<?=$func->id ?>" class="btn btn-warning " role="button">Delete</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p><b>Email:</b> <?=$func->email?></p>
            </div>
            <div class="col-12">
                <p><b>Nif:</b> <?=$func->nif?></p>
            </div>
            <div class="col-12">
                <p><b>Morada:</b> <?=$func->morada . ', ' . $func->localidade . ', ' . $func->codigopostal?></p>
            </div>
        </div>
    </div>
</div>
