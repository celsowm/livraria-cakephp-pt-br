<?php

echo $this->Html->tag('table');
echo $this->Html->tableHeaders(['id', 'nome', 'sub gêneros']);

foreach ($generos as $genero) {

    echo $this->Html->tableCells([
        $genero->id,
        $genero->nome,
        $this->Html->nestedList(array_column($genero->children,'nome'))
    ]);
}
