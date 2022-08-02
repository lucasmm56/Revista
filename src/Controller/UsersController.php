<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Products'],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'add']);
    }

    public function verifyUserExist($user){
        $user_name = $user->name;
        $user_phone = $user->phone;
        return $this->Users->find('all')->where(['users.name' =>$user_name, 'users.phone'=>$user_phone])->first(); 
    }
    
    public function login(){
        $this->viewBuilder()->setLayout('login');

        $user = $this->Users->newEntity();
        
        if ($this->request->is('post')) {

            $user = $this->Users->patchEntity($user, $this->request->getData());

            $user_return = $this->verifyUserExist($user); 
                   
            if(!empty($user_return)){
                $user = $user_return;
                $this->Flash->success(__('Bem vindo de volta '.$user->name.'!'));
                $this->getRequest()->getSession()->write('User.id', $user);
                return $this->redirect(['controller'=>'Products','action' => 'add']);
            }else{
               $this->getRequest()->getSession()->write('User.id', $user);
               if ($this->Users->save($user)) {
                   $this->Flash->success(__('Obrigado '.$user->name.' por acessar a revista, lembre-se de guardar seu nome de usuário e telefone cadastrados para próximos acessos.'));
   
                   return $this->redirect(['controller'=>'Products','action' => 'add']);
               }
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function logout() {
        $this->getRequest()->getSession()->destroy();
        $this->Flash->success(__('Sistema encerrado!'));
        return $this->redirect(['controller'=>'Users','action'=>'login']);
    }
}
