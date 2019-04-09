<?php

echo $this->Html->tag('table');
echo $this->Html->tableHeaders(['id', 'nome', 'ações']);

foreach ($generos as $id => $genero) {

    echo $this->Html->tableCells([
        $id,
        $genero,
        $this->Html->link('alterar',['action'=>'alterar', $id]).
        '&nbsp'.
        $this->Html->link('remover',['action'=>'remover', $id]).
        '&nbsp'.
        $this->Html->link('inserir sub gênero',['action'=>'inserirFilho', $id])
    ]);
}

echo $this->Html->tag('/table');

echo $this->Paginator->numbers();
echo $this->Paginator->prev('« Anterior');
echo $this->Paginator->next('Próximo »');
