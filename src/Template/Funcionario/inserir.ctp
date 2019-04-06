<?php

echo $this->Html->tag('h2');

echo $this->Form->create($funcionario);
    echo $this->Form->control('nome');
    echo $this->Form->control('cpf');
    echo $this->Form->control('habilitacao.categoria');
    echo $this->Form->control('habilitacao.numero');
    echo $this->Form->button('Inserir');
echo $this->Form->end();