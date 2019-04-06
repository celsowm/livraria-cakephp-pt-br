<?php

echo "<table>";
echo $this->Html->tableHeaders(['Nome', 'Ações']);

foreach ($autores as $autor) {
    
    echo $this->Html->tableCells([
        $autor->nome,
        $this->Html->link('alterar', ['action'=>'alterar', $autor->id]).
        '&nbsp'.
        $this->Form->postLink(
                'Remover',
                ['action' => 'remover', $autor->id],
                ['confirm' => 'Deseja remover o(a) autor(a) '.$autor->nome])
    ]);    
}
echo "</table>";

echo $this->Paginator->numbers();
echo $this->Paginator->prev('« Anterior');
echo $this->Paginator->next('Próximo »');