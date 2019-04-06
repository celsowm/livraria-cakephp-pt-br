<?php

echo "<table>";
echo $this->Html->tableHeaders(['Id', 'Título', 'Preço', 'ISBN', 'Edição', 'Ano', 'Editora', 'Autores']);

foreach ($livros as $livro) {
    
    $livros = array_column($livro->autores, 'nome');
    
    echo $this->Html->tableCells([
        $livro->id,
        $livro->titulo,
        $livro->preco,
        $livro->isbn,
        $livro->edicao,
        $livro->ano_publicacao,
        $livro->editora->nome,
        implode('; ', $livros)
    ]);    
}
echo "</table>";

echo $this->Paginator->numbers();
echo $this->Paginator->prev('« Anterior');
echo $this->Paginator->next('Próximo »');