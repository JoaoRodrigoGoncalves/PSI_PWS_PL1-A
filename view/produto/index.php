<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="btn-group">
                <?php
                if($allowRegister){ ?>
                    <a href="./router.php?c=produto&a=create"><button class="btn btn-primary m-2">Criar Produto</button></a>
                <?php } ?>
                <a href="./router.php?c=unidade&a=index"><button class="btn btn-secondary m-2">Gerir Unidades</button></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-bordered ms-2 me-2">
                <thead>
                    <th>Estado</th>
                    <th>Referência</th>
                    <th>Nome</th>
                    <th>Preço Unitário</th>
                    <th>Stock</th>
                    <th></th>
                </thead>
                <tbody>
                <?php foreach ($produtos as $produto){ ?>
                    <tr>
                        <td>
                            <input type="checkbox" <?= ($produto->ativo == 1 ? 'checked' : '') ?> disabled>
                        </td>
                        <td>
                            <?= $produto->id ?>
                        </td>
                        <td>
                            <?= $produto->descricao ?>
                        </td>
                        <td>
                            <?= $produto->preco_unitario ?>€
                        </td>
                        <td>
                            <?= $produto->stock ?>
                        </td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="opcoesProd_<?= $produto->id ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                    Opções
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="opcoesProd_<?= $produto->id ?>">
                                    <li><a class="dropdown-item" href="./router.php?c=produto&a=show&id=<?= $produto->id ?>">Mostrar</a></li>
                                    <li><a class="dropdown-item" href="./router.php?c=produto&a=edit&id=<?= $produto->id ?>">Editar</a></li>
                                    <li><a class="dropdown-item" href="./router.php?c=produto&a=delete&id=<?= $produto->id ?>">Apagar</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>