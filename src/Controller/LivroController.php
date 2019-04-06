<?php

namespace App\Controller;

/**
 * Description of LivroController
 *
 * @author celso
 * @property \App\Model\Table\LivroTable $Livro
 */
class LivroController extends AppController {
    //put your code here
    
    public function index() {
        
        $query = $this->Livro->find()
                ->contain(['Editora','Autor']);
        
        $livros = $this->paginate($query);
        
        $this->set(compact('livros'));
        
    }
    
    public function inserir(){
        
        $livro    = $this->Livro->newEntity();
        $editoras = $this->Livro->Editora->find('list');
        $autores  = $this->Livro->Autor->find('list');
        
        if($this->getRequest()->isPost()){
            
            $livro = $this->Livro->patchEntity(
                    $livro,
                    $this->getRequest()->getData(),
                    ['associated'=>['Autor']]);

            if ($this->Livro->save($livro)) {
                $this->Flash->success('Registro salvo com sucesso');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Ocorreu um erro!');
            
        }
        
        $this->set(compact('livro','editoras','autores'));
        
    }
    
}
