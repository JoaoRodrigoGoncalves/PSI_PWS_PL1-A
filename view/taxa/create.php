<h2 class="text-left top-space">Criar Taxa</h2> 
<h2 class="top-space"></h2> 
<div class="form"> 
    <form action="router.php?c=taxa&a=store" method="post" class="needs-validation row justify-content-center" novalidate>
            <div class="col col-6">
                <div class="mb-3">
                    <input type="checkbox" id="emvigor" name="emvigor"/>
                    <label for="emvigor"> Ativo</label><br>
                </div>
                <div class="mb-3">
                    <label for="inputValor" class="form-label">Valor:</label>
                    <input type="number" class="form-control" id="valor" name="valor" required/>
                    <div class="invalid-feedback">
                        Campo obrigatório!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputDescicao" class="form-label">Descrição:</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" required>
                    <div class="invalid-feedback">
                        Campo obrigatório!
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Registar</button>
            </div>
    </form>
</div> 