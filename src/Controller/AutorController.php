<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

/**
 * AcervoController Controller
 *
 * @property \App\Model\Table\AutorTable $Autor
 *
 */
class AutorController extends AppController {
    
    public $paginate = [
        'limit' => 10
    ];


    //put your code here

    public function index() {

        $queryAutor = $this->Autor->find();
        $autores = $this->paginate($queryAutor);
        $this->set(compact('autores'));

    }

    public function inserir() {

        $autor = $this->Autor->newEntity();

        if ($this->getRequest()->isPost()) {

            $autor = $this->Autor->patchEntity($autor,
                    $this->getRequest()->getData());

            if ($this->Autor->save($autor)) {
                $this->Flash->success('Registro salvo com sucesso');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Ocorreu um erro!');
        }

        $this->set(compact('autor'));
    }

    public function alterar(int $id) {

        $autor = $this->Autor->get($id);

        if ($this->getRequest()->is(['post', 'put'])) {

            $this->Autor->patchEntity($autor, $this->request->getData());
            if ($this->Autor->save($autor)) {
                $this->Flash->success("O autor {$autor->id} foi atualizado");
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Erro na atualização');
        }


        $this->set(compact('autor'));
    }

    public function remover(int $id) {

        $autor = $this->Autor->get($id);
        
        if ($this->Autor->delete($autor)) {
            $this->Flash->success('O autor {0} foi removido com sucesso', $autor->nome);
            return $this->redirect(['action' => 'index']);
        }
    }

}
