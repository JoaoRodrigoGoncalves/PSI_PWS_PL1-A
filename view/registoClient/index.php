<main class="d-flex flex-column h-100">
    <div class="flex-shrink-0">
        <div class="container my-5">
            <h2 class="alert-info p-3">Lista de Clientes</h2>
            <h2 class="top-space"></h2> 
            <div class="row"> 
                <div class="col-sm-12"> 
                    <table class="table table-striped">
                        <thead>
                            <th>
                                <h3>Nome</h3>
                            </th>
                            <th>
                                <h3>Email</h3>
                            </th>
                            <th>
                                <h3>Telefone</h3>
                            </th>
                            <th>
                                <h3>Nif</h3>
                            </th>
                            <th>
                                <h3>Morada</h3>
                            </th>
                            <th>
                                <h3>Ações</h3>
                            </th>
                        </thead> 
                        <tbody>
                            <?php foreach ($clientes as $cliente) { ?> 
                                <tr>              
                                    <td><?=$cliente->username?></td> 
                                    <td><?=$cliente->email?></td>
                                    <td><?=$cliente->telefone?></td>
                                    <td><?=$cliente->nif?></td>
                                    <td><?=$cliente->morada . "," . $cliente->localidade . "," . $cliente->codigopostal?></td>
                                    <td>  
                                        <a href="router.php?c=registo&a=edit&id=<?=$cliente->id ?>" class="btn btn-info" role="button">Edit</a> 
                                        <a href="router.php?c=registo&a=delete&id=<?=$cliente->id ?>" class="btn btn-warning" role="button">Delete</a> 
                                    </td> 
                                </tr> 
                            <?php } ?> 
                        </tbody> 
                    </table> 
                </div> 
            </div>
            <div class="col-12 mt-5">
                <h2 class="p-3 alert-warning">Adicionar Cliente</h2> 
                <a href="router.php?c=registo&a=create" class="btn btn-primary"><i class="icon-plus"></i> Cliente</a>
            </div>
        </div>
    </div> 
</div> 