<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Model\Table;
use Cake\ORM\Table;

/**
 * CakePHP FuncionarioTable
 * @author celso
 */
class FuncionarioTable extends Table {
    
    public function initialize(array $config) {
        parent::initialize($config);
        
        $this->hasOne('Habilitacao');
        
        $this->setDisplayField('nome');
        
        $this->hasOne('Gerente')
                ->setClassName('Funcionario')
                ->setForeignKey('gerente_id');
    }
    
}
