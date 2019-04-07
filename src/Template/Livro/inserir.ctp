<?php

echo $this->Form->create($livro);
    echo $this->Form->control('titulo', ['label'=>'Título']);
    echo $this->Form->control('preco', ['label'=>'Preço']);
    echo $this->Form->control('isbn');
    echo $this->Form->control('edicao', ['label'=>'Edição']);
    echo $this->Form->control('ano_publicacao', ['label'=>'Ano de Publicação']);
    echo $this->Form->control('editora_id', ['options'=>$editoras]);
    echo $this->Form->control('genero_id', ['options'=>$generos]);
    foreach(range(0,3) as $i){
        echo $this->Form->control("autores.$i.id", 
                [
                 'type'=> 'select',
                 'options'=>$autores, 
                 'empty'=>'Selecione um(a) autor(a)'
                ]);
    }
    echo $this->Form->button('Inserir');
echo $this->Form->end();
