# Livraria: um app em CakePHP 3 em PT-BR

PPT do Curso: https://docs.google.com/presentation/d/1N30RcEOx484jz38Tr6gS3EHC0dBRaTUPN61T50dpcOU/edit?usp=sharing

## Introdução:

Este projeto faz parte de um curso de PHP e CakePHP e possui algumas características:

 - **Todos os tipos de relacionamentos:** este app foi criado com a tema de livraria com uma intenção proposital, possuir todos os tipos de relacionamento entre tabelas do modelo relacional. Acreditamos que explorando cada um destes relacionamentos, podemos prover exemplos reais para implementação de qualquer sistema em CakePHP 3.

 - **Tabelas no singular:** sim! Optamos por utilizar tabelas no singular
   para evitar utilizar plugins de inflections para o idioma português.
   Além disso, o CakePHP suporta reflexão transparente por homonímia
   (ex.: *tabela Autor, entity AutorTable, model AutorTable e controller
   AutorController*).
   
 - **HTML escrito por PHP:** para evitar misturar HTML com PHP, utilizamos ao máximo os Helpers do CakePHP para escrita de HTML com o próprio PHP e evitar assim, colocar *<?php* dentro de tags htmls gerando uma confusão de sintaxes e linguagens.
   

## Banco de Dados:

![](https://github.com/celsowm/livraria-cakephp-pt-br/blob/master/model/livraria_model.png)

> Modelo de Banco de Dados usando a notação Crow's Foot.

### Contém todos os tipos de associações: 

- **hasOne (1..1)**: Funcionário tem uma Habilitação.
- **hasMany (1..*)**: Editora tem muitos Livros.
- **belongsTo (*..1)**: Livros pertencem a uma Editora.
- **belongsToMany (**..*)**: Livros têm muitos Autores e Autores têm muitos Livros.


### Associações especiais:

- **auto relacionamento**: Funcionário tem gerente Gerente (Funcionário).
- **belongsToMany ([through](https://book.cakephp.org/3.0/en/orm/associations.html#using-the-through-option))**: Pedido tem muitos Livros (através de ItemPedido).
- **[árvore](https://book.cakephp.org/3.0/en/orm/behaviors/tree.html)**: Gênero tem nós filhos, irmãos e pais.


