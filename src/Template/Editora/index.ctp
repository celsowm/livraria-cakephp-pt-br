<?php

echo $this->Html->tag('fieldset');
echo $this->Html->tag('legend','Pesquisa');
echo $this->Form->create($editora, ['method'=>'get']);
echo $this->Form->input('nome');
echo $this->Form->button('filtrar');
echo $this->form->end();
echo $this->Html->tag('/fieldset');

echo $this->Html->tag("table");
echo $this->Html->tableHeaders(['Nome','WebSite','CNPJ', 'Endereço', 'Livros']);

foreach ($editoras as $editora){
    
    $livros = array_column($editora->livros, 'titulo');
    
    echo $this->Html->tableCells([
       $editora->nome,
       $editora->website,
       $editora->cnpj,
       $editora->endereco,
       $this->Html->nestedList($livros)
    ]);
    
}

echo $this->Html->tag('/table');

echo $this->Paginator->numbers();
echo $this->Paginator->prev('« Anterior');
echo $this->Paginator->next('Próximo »');