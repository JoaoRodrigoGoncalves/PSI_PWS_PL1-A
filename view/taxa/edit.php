<main class="d-flex flex-column h-100">
    <div class="flex-shrink-0">
        <div class="container my-5">
            <h1 class="text-center top-space display-4">Editar Taxa</h1> 
            <h2 class="top-space"></h2> 
            <div class="form"> 
                <form action="router.php?c=taxa&a=update&id=<?=$taxas->id?>" method="post" class="needs-validation row justify-content-center" novalidate>
                    <div class="col col-6">
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="emvigor" name="emvigor" <?=$taxas->emvigor == 1 ? 'checked' : '' ?>/>
                            <label for="emvigor" class="form-check-label"> Ativo</label><br>
                        </div>
                        <div class="mb-3">
                            <label for="inputValor" class="form-label">Valor:</label>
                            <input type="number" class="form-control" id="valor" name="valor" value="<?=$taxas->valor?>"/>
                        </div>
                        <div class="mb-3">
                            <label for="inputDescricao" class="form-label">Descrição:</label>
                            <input type="text" class="form-control" id="descricao" name="descricao" value="<?=$taxas->descricao?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>