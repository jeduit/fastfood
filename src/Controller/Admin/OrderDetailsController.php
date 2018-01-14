<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * OrderDetails Controller
 *
 * @property \App\Model\Table\OrderDetailsTable $OrderDetails
 *
 * @method \App\Model\Entity\OrderDetail[] paginate($object = null, array $settings = [])
 */
class OrderDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->viewBuilder()->layout('admin/admin');
        $this->paginate = [
            'contain' => ['Orders', 'Products']
        ];
        $orderDetails = $this->paginate($this->OrderDetails);

        $this->set(compact('orderDetails'));
        $this->set('_serialize', ['orderDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Order Detail id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('admin/admin');
        $orderDetail = $this->OrderDetails->get($id, [
            'contain' => ['Orders', 'Products']
        ]);

        $this->set('orderDetail', $orderDetail);
        $this->set('_serialize', ['orderDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('admin/admin');
        $orderDetail = $this->OrderDetails->newEntity();
        if ($this->request->is('post')) {
            $orderDetail = $this->OrderDetails->patchEntity($orderDetail, $this->request->getData());
            if ($this->OrderDetails->save($orderDetail)) {
                $this->Flash->success(__('The order detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order detail could not be saved. Please, try again.'));
        }
        $orders = $this->OrderDetails->Orders->find('list', ['limit' => 200]);
        $products = $this->OrderDetails->Products->find('list', ['limit' => 200]);
        $this->set(compact('orderDetail', 'orders', 'products'));
        $this->set('_serialize', ['orderDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Order Detail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('admin/admin');
        $orderDetail = $this->OrderDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orderDetail = $this->OrderDetails->patchEntity($orderDetail, $this->request->getData());
            if ($this->OrderDetails->save($orderDetail)) {
                $this->Flash->success(__('The order detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order detail could not be saved. Please, try again.'));
        }
        $orders = $this->OrderDetails->Orders->find('list', ['limit' => 200]);
        $products = $this->OrderDetails->Products->find('list', ['limit' => 200]);
        $this->set(compact('orderDetail', 'orders', 'products'));
        $this->set('_serialize', ['orderDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Order Detail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        
        $this->request->allowMethod(['post', 'delete']);
        $orderDetail = $this->OrderDetails->get($id);
        if ($this->OrderDetails->delete($orderDetail)) {
            $this->Flash->success(__('The order detail has been deleted.'));
        } else {
            $this->Flash->error(__('The order detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
