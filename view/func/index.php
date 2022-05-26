<div class="container">
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-12">
                <h2 class="p-2 alert-primary">List de funcionarios</h2>
            </div>
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                    <th>
                        <h3>Id</h3>
                    </th>
                    <th>
                        <h3>Nome</h3>
                    </th>
                    <th>
                        <h3>Nif</h3>
                    </th>
                    <th>
                        <h3>email</h3>
                    </th>
                    <th>
                        <h3>Morada</h3>
                    </th>
                    <th>
                        <h3>Ativo</h3>
                    </th>
                    <th>
                        <h3>Actions</h3>
                    </th>
                    </thead>
                    <tbody>
                    <?php foreach ($funcionarios as $funcionario) { ?>
                        <tr>
                            <td><?=$funcionario->id?></td>
                            <td><?=$funcionario->username?></td>
                            <td><?=$funcionario->nif?></td>
                            <td><?=$funcionario->email?></td>
                            <td><?=$funcionario->morada .', '.$funcionario->localidade.', '.$funcionario->codigopostal?></td>
                            <td>
                                <div class="form-check form-switch" >
                                    <input class="form-check-input" type="checkbox"
                                           id="func_state" disabled
                                        <?=$funcionario->ativo ? 'checked' : ''?>>
                                </div>
                            </td>
                            <td>
                                <a href="router.php?c=func&a=show&id=<?=$funcionario->id ?>" class="btn btn-primary" role="button">Show</a>
                                <a href="router.php?c=func&a=edit&id=<?=$funcionario->id ?>" class="btn btn-info" role="button">Edit</a>
                                <a href="router.php?c=func&a=delete&id=<?=$funcionario->id ?>" class="btn btn-warning" role="button">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-12 mt-5">
                <h2 class="p-2 alert-warning">
                    Adicionar Funcionario
                </h2>
                <a href="router.php?c=func&a=create" class="btn btn-primary">Criar novo funcionario</a>
            </div>
        </div>
    </div>
</div>