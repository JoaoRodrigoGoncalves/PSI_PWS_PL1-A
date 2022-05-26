<main class="d-flex flex-column h-100">
    <div class="flex-shrink-0">
        <div class="container my-5">
            <h2 class="alert-info p-3">Taxas de IVA</h2>
            <h2 class="top-space"></h2> 
            <div class="row"> 
                <div class="col-sm-12"> 
                    <table class="table table-striped">
                        <thead>
                            <th>
                                <h3>*</h3>
                            </th>
                            <th>
                                <h3>Valor</h3>
                            </th>
                            <th>
                                <h3>Descrição</h3>
                            </th>
                            <th>
                                <h3>Ações</h3>
                            </th>
                        </thead> 
                        <tbody>
                            <?php foreach ($taxas as $taxa) { ?> 
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input" id="emvigor" name="emvigor" <?=$taxa->emvigor == 1 ? 'checked' : ''?>/>
                                        <label for="emvigor" class="form-check-label"> Ativo</label>
                                    </td>                 
                                    <td><?=$taxa->valor?></td> 
                                    <td><?=$taxa->descricao?></td> 
                                    <td>  
                                        <a href="router.php?c=taxa&a=edit&id=<?=$taxa->id ?>" class="btn btn-info" role="button">Edit</a> 
                                        <a href="router.php?c=taxa&a=delete&id=<?=$taxa->id ?>" class="btn btn-warning" role="button">Delete</a> 
                                    </td> 
                                </tr> 
                            <?php } ?> 
                        </tbody> 
                    </table> 
                </div> 
                <div class="col-12 mt-5">
                    <h2 class="p-3 alert-warning">Adicionar Taxa</h2> 
                    <a href="router.php?c=taxa&a=create" class="btn btn-primary"><i class="icon-plus"></i> Taxa</a>
                </div> 
            </div>
        </div>
    </div>
</main> 