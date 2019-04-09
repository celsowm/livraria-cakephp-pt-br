<?php

echo $this->Html->tag('h2', 'Inserir sub gênero de'. $genero->parent->nome);

echo $this->Form->create($genero);
echo $this->Form->input('nome');
echo $this->Form->button('Inserir');
echo $this->Form->end();
