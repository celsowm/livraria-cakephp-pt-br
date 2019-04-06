<?php

echo $this->Html->tag("table");
echo $this->Html->tableHeaders(['Nº', 'Data/Hora', 'Vendedor', 'Total']);

foreach ($pedidos as $pedido) {

    echo $this->Html->tableCells([
        $pedido->id,
        $pedido->data,
        $pedido->funcionario->nome,
        array_sum(array_map(function($livro){
            return $livro->preco * $livro->_joinData->quantidade;
        }, $pedido->livros))
    ]);
}
echo $this->Html->tag("/table");

echo $this->Paginator->numbers();
echo $this->Paginator->prev('« Anterior');
echo $this->Paginator->next('Próximo »');