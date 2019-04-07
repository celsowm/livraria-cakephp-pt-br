<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model\Table;

use Cake\ORM\Table;

/**
 * Description of LivroTable
 *
 * @author celso
 */
class LivroTable extends Table {
    //put your code here
    
    public function initialize(array $config) {
        parent::initialize($config);
        
        $this->belongsTo('Editora');
        $this->belongsToMany('Autor')
                ->setProperty('autores');
        
        $this->belongsToMany('Pedido')
                ->setThrough('ItemPedido');
        
        $this->belongsTo('Genero');
        
        $this->setDisplayField('titulo');
    }
    
}
