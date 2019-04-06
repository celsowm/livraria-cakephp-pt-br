<?php
namespace App\Model\Table;
use Cake\ORM\Table;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AutorTable
 *
 * @author celso
 */
class AutorTable extends Table{
    //put your code here
    
    public function initialize(array $config){
        parent::initialize($config);
        $this->belongsToMany('Livro')
                ->setProperty('livros');
    }
    
}
