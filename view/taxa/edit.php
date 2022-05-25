<h2 class="text-left top-space">Editar Taxa</h2> 
<h2 class="top-space"></h2> 
<div class="form"> 
    <form action="router.php?c=taxa&a=update&id=<?=$taxas->id?>" method="post" class="needs-validation row justify-content-center" novalidate>
    <div class="col col-6">
        <div class="mb-3">
            <input type="checkbox" id="emvigor" name="emvigor" <?=$taxas->emvigor == 1 ? 'checked' : '' ?>/>
            <label for="emvigor"> Ativo</label><br>
        </div>
        <div class="mb-3">
            <label for="inputID" class="form-label">Id:</label>
            <input type="text" class="form-control" id="id" name="id" value="<?=$taxas->id?>" disabled>
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
    </form>
    </div>
</div>