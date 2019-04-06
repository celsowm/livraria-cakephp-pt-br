<?php

namespace App\Controller;

use App\Controller\AppController;

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

    public function index(){
        
        $generos = $this->Genero->find('threaded');
        
        $this->set(compact('generos'));
    }

}
