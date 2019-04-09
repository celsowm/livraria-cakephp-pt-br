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

        //$query   = $table->find('threaded');
        $generos = $this->paginate($query);

        $this->set(compact('generos'));
    }

}
