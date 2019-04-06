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
 * @property \App\Model\Table\PedidoTable $Pedido
 *
 */
class PedidoController extends AppController {

    public function index() {

        $query = $this->Pedido->find()
                ->contain(['Livro', 'Funcionario']);

        $pedidos = $this->paginate($query);

        $this->set(compact('pedidos'));
    }

    public function inserir() {

        $pedido = $this->Pedido->newEntity();
        $funcionarios = $this->Pedido->Funcionario->find('list');
        $livros       = $this->Pedido->Livro->find('list');
        $clientes     = $this->Pedido->Cliente->find('list');

        if ($this->getRequest()->isPost()) {

            $pedido = $this->Pedido->patchEntity(
                    $pedido,
                    $this->getRequest()->getData());
            
            if ($this->Pedido->save($pedido)) {
                $this->Flash->success('Registro salvo com sucesso');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Ocorreu um erro!');
        }
        
        $this->set(compact('pedido', 'funcionarios', 'livros','clientes'));
    }

}
