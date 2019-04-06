<?php

echo $this->Form->create($autor);
    echo $this->Form->control('nome');
    echo $this->Form->button('Inserir');
echo $this->Form->end();