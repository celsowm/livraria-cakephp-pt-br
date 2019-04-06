<?php

echo $this->Form->create($autor);
    echo $this->Form->control('nome');
    echo $this->Form->button('Alterar');
echo $this->Form->end();