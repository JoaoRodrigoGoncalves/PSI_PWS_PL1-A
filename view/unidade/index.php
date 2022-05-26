<div class="container">
    <div class="row mt-2">
        <div class="col">
            <a href="./router.php?c=unidade&a=create"><button class="btn btn-primary">Adicionar Unidade</button></a>
            <a href="./router.php?c=produto&a=index"><button class="btn btn-secondary">Voltar a Produtos</button></a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-bordered mt-2">
                <thead>
                    <th>Unidade</th>
                    <th></th>
                </thead>
                <tbody>
                <?php foreach ($unidades as $unidade) { ?>
                    <tr>
                        <td><?= $unidade->unidade ?></td>
                        <td>
                            BTN1
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>