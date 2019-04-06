<?php

echo $this->Form->create($pedido);
echo $this->Form->control('data', ['type' => 'date']);
echo $this->Form->control('funcionario_id');
echo $this->Form->control('cliente_id');
foreach (range(0, 3) as $i) {
    echo $this->Form->control("livros.$i.id", [
        'options' => $livros, 
        'type' => 'select',
        'empty'=> 'Selecione...'
        ]);
    echo $this->Form->control("livros.$i._joinData.quantidade");
}

echo $this->Form->button('salvar');
echo $this->Form->end();
