<?php

namespace App\Controller;

use App\Controller\AppController;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP FuncionarioController
 * @author celso
 * @property \App\Model\Table\FuncionarioTable $Funcionario
 */
class FuncionarioController extends AppController {

    public function index() {

        $query = $this->Funcionario->find()
                ->contain('Habilitacao')
                ->contain('Gerente');

        $funcionarios = $this->paginate($query);
        $this->set(compact('funcionarios'));
    }

    public function inserir() {

        $funcionario = $this->Funcionario->newEntity([], [
                    'associated' =>
                        ['Habilitacao']
                    ]);

        if ($this->getRequest()->isPost()) {

            $funcionario = $this->Funcionario->patchEntity(
                    $funcionario,
                    $this->getRequest()->getData(),
                    ['associated' =>
                        ['Habilitacao']
                    ]
            );

            if ($this->Funcionario->save($funcionario)) {
                $this->Flash->success('Registro salvo com sucesso');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Ocorreu um erro!');
        }

        $this->set(compact('funcionario'));
    }

}
