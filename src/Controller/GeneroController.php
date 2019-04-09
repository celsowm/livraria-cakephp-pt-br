<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Entity;
use Cake\ORM\ResultSet;
use Cake\ORM\TableRegistry;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP GeneroController
 * @author celso
 * @property \App\Model\Table\GeneroTable $Genero
 */
class GeneroController extends AppController {

    public function index() {

        $table = TableRegistry::getTableLocator()->get('Genero');

        $query = $table
                ->find()
                ->formatResults(function(ResultSet $results) use ($table) {
            return $results->map(function (Entity $row) use ($table) {
                        $row['level'] = $table->getLevel($row['id']);
                        return $row;
                    });
        });

        $query   = $table->find('treeList', ['spacer'=>'> ']);
        $generos = $this->paginate($query);

        $this->set(compact('generos'));
    }
    
    public function inserirFilho(int $parent_id){

        $genero = $this->Genero->newEntity();
        $genero->parent = $this->Genero->get($parent_id);
        
        if($this->getRequest()->isPost()){
            
            $genero = $this->Genero->patchEntity($genero, $this->getRequest()->getData());
            
            if($this->Genero->save($genero)){
                $this->Flash->success('Gênero salvo com sucesso !');
                $this->redirect(['action'=>'index']);
            }else{
                $this->Flash->error('Ocorreu um erro!');
            }
            
        }
 
        $this->set(compact('genero'));
        
    }

}
