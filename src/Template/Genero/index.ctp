<?php

echo $this->Html->tag('table');
echo $this->Html->tableHeaders(['id', 'nome', 'sub gêneros']);

$lista = [];

function lista($generos, $lista) {
    
    foreach ($generos as $genero) {
        $lista[$genero->id] = $genero;
        if ($genero->has('children')) {
            $lista = lista($genero->children, $lista);
        }
    }
    
    return $lista;
}

$generos_lista = lista($generos->toArray(), $lista);

foreach ($generos_lista as $genero) {

    echo $this->Html->tableCells([
        $genero->id,
        str_repeat('>', $genero->level)." ".$genero->nome,
            //$this->Html->nestedList(array_column($genero->children,'nome'))
    ]);
}


