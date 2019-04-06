<?php

namespace App\Model\Table;
use Cake\ORM\Table;

/**
 * CakePHP PedidoTable
 * @author celso
 */
class PedidoTable extends Table {
    
    public function initialize(array $config): void {
        
        parent::initialize($config);
        
        $this->belongsToMany('Livro')
                ->setProperty('livros')
                ->setThrough('ItemPedido');
        
        $this->belongsTo('Funcionario');
        $this->belongsTo('Cliente');
    }
    
}
