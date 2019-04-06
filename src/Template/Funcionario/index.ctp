<?php

echo $this->Html->tag('h2', 'Funcionários');

echo $this->Html->tag('table');
echo $this->Html->tableHeaders(['Id', 'Nome', 'CPF', 'Habilitação', 'Gerente']);

foreach ($funcionarios as $funcionario) {
    
    echo $this->Html->tableCells([
        $funcionario->id,
        $funcionario->nome,
        $funcionario->cpf,
        ($funcionario->habilitacao) ? $funcionario->habilitacao->categoria : '-',
        ($funcionario->gerente) ? $funcionario->gerente->nome : '-'
    ]);    
}
echo $this->Html->tag('/table');

echo $this->Paginator->numbers();
echo $this->Paginator->prev('« Anterior');
echo $this->Paginator->next('Próximo »');