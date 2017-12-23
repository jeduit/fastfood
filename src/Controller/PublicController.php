<?php
namespace App\Controller;
use App\Controller\AppController;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class PublicController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->loadModel('Products');
        $this->viewBuilder()->layout('public/public');
        $products = $this->paginate($this->Products);
        $this->set(compact('products'));
        // $head_banner = $this->paginate($this->HeadBanners);
        // $foot_banner = $this->paginate($this->FootBanners);
        // $infomations = $this->paginate($this->Infomations);
        
        // $this->set(compact('head_banner'));
        // $this->set(compact('foot_banner'));
        // $this->set(compact('infomations'));
    }

        public function contact()
    {
        $this->loadModel('Products');
        $this->viewBuilder()->layout('public/public');
        $products = $this->paginate($this->Products);
        $this->set(compact('products'));
        // $head_banner = $this->paginate($this->HeadBanners);
        // $foot_banner = $this->paginate($this->FootBanners);
        // $infomations = $this->paginate($this->Infomations);
        
        // $this->set(compact('head_banner'));
        // $this->set(compact('foot_banner'));
        // $this->set(compact('infomations'));
    }

     public function about()
    {
        $this->loadModel('Products');
        $this->viewBuilder()->layout('public/public');
        $products = $this->paginate($this->Products);
        $this->set(compact('products'));
    }

    /**
    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
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
        $this->set('_serialize', ['user']);
    }
    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
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
        $this->set('_serialize', ['user']);
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
        return $this->redirect(['action' => 'index']);
    }
}