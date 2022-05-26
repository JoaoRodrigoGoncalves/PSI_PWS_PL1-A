Ref: <?= $produto->id ?><br>
Descrição: <?= $produto->descricao ?><br>
Preço: <?= $produto->preco_unitario ?>€<br>
Iva: <?= $produto->taxa->valor ?>%<br>
Stock: <?= $produto->stock . $produto->unidade->unidade ?>
