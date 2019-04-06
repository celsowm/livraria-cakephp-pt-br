<?php

echo $this->Form->create($editora);
    echo $this->Form->input('nome');
    echo $this->Form->input('website');
    echo $this->Form->input('cnpj');
    echo $this->Form->input('endereco', ['label'=>'Endereço']);
    echo $this->Form->button('cadastrar');
echo $this->Form->end();


