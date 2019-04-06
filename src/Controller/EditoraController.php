<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

/**
 * EditoraController Controller
 *
 * @property \App\Model\Table\EditoraTable $Editora
 *
 */
class EditoraController extends AppController {
    
    public function index(){
        
        $editora = $this->Editora->newEntity($this->request->getQueryParams());

        $filtros[] = ($editora->nome) ? ['nome LIKE'=>"%{$editora->nome}%"] : null;
        
        $query = $this->Editora->find()
                ->contain('Livro');
        
        $query->andWhere($filtros);
        
        $editoras = $this->paginate($query);
        
        $this->set(compact('editora','editoras'));
        
        
    }
    
    public function inserir(){
        
        $editora = $this->Editora->newEntity();
        
        if($this->getRequest()->isPost()){
            
            $editora = $this->Editora->patchEntity($editora, $this->getRequest()->getData());
            
            if($this->Editora->save($editora)){
                $this->Flash->success('Editora salva com sucesso !');
                $this->redirect(['action'=>'index']);
            }else{
                $this->Flash->error('Deu merda');
            }
            
        }
        
        $this->set(compact('editora'));
        
    }
    
}
