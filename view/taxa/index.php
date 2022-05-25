<h2 class="text-left top-space">Taxas de IVA</h2> 
<h2 class="top-space"></h2> 
<div class="row"> 
    <div class="col-sm-12"> 
        <table class="table table-striped">
            <thead>
                <th>
                    <h3>*</h3>
                </th>
                <th>
                    <h3>Id</h3>
                </th>
                <th>
                    <h3>Valor</h3>
                </th>
                <th>
                    <h3>Descrição</h3>
                </th>
            </thead> 
            <tbody>
                <?php foreach ($taxas as $taxa) { ?> 
                    <tr>
                        <td>
                            <input type="checkbox" id="emvigor" name="emvigor" <?=$taxa->emvigor == 1 ? 'checked' : ''?>
                            <label for="emvigor"> Ativo</label>
                        </td>                 
                        <td><?=$taxa->id?></td> 
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
    <div class="col-sm-6"> 
        <h3>Criar uma Nova Taxa</h3> 
        <p> 
            <a href="router.php?c=taxa&a=create" class="btn btn-info" role="button">New</a> 
        </p> 
    </div> 
</div> 