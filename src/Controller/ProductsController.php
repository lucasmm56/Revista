<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $id = $this->findId();
        $this->paginate = [
            'contain' => ['Users'],'conditions'=>['products.user_id'=>$id],
        ];
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set('product', $product);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $user_id = $this->findId();
        $this->paginate = [
            'contain' => ['Users'],'conditions'=>['products.user_id'=>$user_id],'limit'=>'3'
        ];
        $products = $this->paginate($this->Products);

        if(!empty($id)){
            $product = $this->Products->get($id, [
                'contain' => [],
            ]);
        }else{
            $product = $this->Products->newEntity();
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            $product->user_id = $user_id;
            
            if ($this->Products->save($product)) {
                $this->Flash->success(__('Produto salvo com sucesso.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('O produto não pode ser salvo.Por favor tente novamente.'));
        }
        $users = $this->Products->Users->find('list', ['limit' => 200]);
        $this->set(compact('product', 'users', 'id','products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $users = $this->Products->Users->find('list', ['limit' => 200]);
        $this->set(compact('product', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('Produto deletado com sucesso.'));
        } else {
            $this->Flash->error(__('O produto não pode ser deletado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'add']);
    }
}
