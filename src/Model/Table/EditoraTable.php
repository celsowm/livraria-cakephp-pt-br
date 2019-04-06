<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model\Table;

use Cake\ORM\Table;

/**
 * Description of EditoraTable
 *
 * @author celso
 */
class EditoraTable extends Table {
    //put your code here
    public function initialize(array $config) {
        parent::initialize($config);
        $this->setDisplayField('nome');
        $this->hasMany('Livro')
                ->setProperty('livros');
    }
}
