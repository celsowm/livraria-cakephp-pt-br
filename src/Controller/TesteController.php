<?php

namespace App\Controller;

use Cake\Database\Expression\QueryExpression;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;

/**
 * CakePHP TesteController
 * @author celso
 */
class TesteController extends AppController {

    public function query() {

        $editoraTable = TableRegistry::getTableLocator()->get('Editora');
        $pedidoTable = TableRegistry::getTableLocator()->get('Pedido');

        //mais de um filtro
        $editoraTable->find()
                ->where([
                    'nome' => 'EDITORA VILA 8',
                    'website' => 'www.vila8.org'
        ]);

        $editoraTable->find()
                ->where(['nome' => 'EDITORA VILA 8'])
                ->andWhere(['website' => 'www.vila8.org'])
                ->andWhere(['cpf' => 1654984546549]);


        //filtro no lado N apenas com os dados do lado 1
        //query 1
        $query = $editoraTable->find()
                ->select($editoraTable)
                ->distinct()
                ->matching('Livro')
                ->where(['Livro.preco >' => 50]);


        //filtro no lado N mostrando os dados do lado 1 e do lado N
        //query 2
        $query2 = $editoraTable->find()
                ->distinct()
                ->contain('Livro')
                ->innerJoinWith('Livro')
                ->where(['Livro.preco >' => 50]);

        //query 2 fixed
        $filtro_livro = ['Livro.preco >' => 50];
        $query2fixed = $editoraTable->find()
                ->distinct()
                ->contain(['Livro' => function (Query $q) use ($filtro_livro) {
                        return $q
                                ->where($filtro_livro);
                    }])
                ->innerJoinWith('Livro')
                ->where($filtro_livro);

        //query 3 - N:N
        $query3 = $editoraTable->find()
                ->distinct()
                ->innerJoinWith('Livro')
                ->innerJoinWith('Livro.Autor')
                ->where(['Autor.nome LIKE' => '%a%']);

        //query 4 - N:N com through
        $query4 = $pedidoTable->find()
                ->distinct()
                ->innerJoinWith('Livro');

        //query 4 - N:N com filtro no through
        $query4comfiltro = $pedidoTable->find()
                ->distinct()
                ->innerJoinWith('Livro')
                ->where(['ItemPedido.quantidade >' => 2]);

        //query 4 - N:N com filtro no through e dados da associação
        $filtro_item_pedido = ['ItemPedido.quantidade >' => 20];
        $query4comfiltroecontain = $pedidoTable->find()
                ->distinct()
                ->contain(['Livro' => function (Query $q) use ($filtro_item_pedido) {
                        return $q->where($filtro_item_pedido);
                    }])
                ->innerJoinWith('Livro')
                ->where($filtro_item_pedido);

        //query 5 - N:N com filtro em dado agregado no through
        $campos_agregacao = ['Pedido.id', 'Pedido.data'];
        $query5 = $pedidoTable->find();
        $query5
                ->select($campos_agregacao)
                ->select(['total' => $query5->func()->sum('quantidade')])
                ->innerJoinWith('Livro')
                ->group($campos_agregacao)
                ->having(function (QueryExpression $exp, Query $q) {
                    $total = $q->func()->sum('quantidade');
                    return $exp
                            ->gte($total, 11);
                });

        //query 5 - N:N com filtro em dado agregado no through e dados da associação        
        $campos_agregacao = ['Pedido.id', 'Pedido.data'];
        $query52 = $pedidoTable->find();
        $query52
                ->select($campos_agregacao)
                ->select(['total' => $query52->func()->sum('quantidade')])
                ->contain('Livro')
                ->innerJoinWith('Livro')
                ->group($campos_agregacao)
                ->having(function (QueryExpression $exp, Query $q) {
                    $total = $q->func()->sum('quantidade');
                    return $exp
                            ->gte($total, 11);
                })
                ->toArray();

        $this->viewBuilder()->enableAutoLayout(false);
    }

}
