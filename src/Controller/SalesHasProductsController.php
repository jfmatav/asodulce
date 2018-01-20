<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SalesHasProducts Controller
 *
 * @property \App\Model\Table\SalesHasProductsTable $SalesHasProducts
 */
class SalesHasProductsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $salesHasProducts = $this->paginate($this->SalesHasProducts);

        $this->set(compact('salesHasProducts'));
        $this->set('_serialize', ['salesHasProducts']);
    }

    /**
     * View method
     *
     * @param string|null $id Sales Has Product id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $salesHasProduct = $this->SalesHasProducts->get($id, [
            'contain' => []
        ]);

        $this->set('salesHasProduct', $salesHasProduct);
        $this->set('_serialize', ['salesHasProduct']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $salesHasProduct = $this->SalesHasProducts->newEntity();
        if ($this->request->is('post')) {
            $salesHasProduct = $this->SalesHasProducts->patchEntity($salesHasProduct, $this->request->data);
            if ($this->SalesHasProducts->save($salesHasProduct)) {
                $this->Flash->success(__('The sales has product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sales has product could not be saved. Please, try again.'));
        }
        $this->set(compact('salesHasProduct'));
        $this->set('_serialize', ['salesHasProduct']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sales Has Product id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $salesHasProduct = $this->SalesHasProducts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $salesHasProduct = $this->SalesHasProducts->patchEntity($salesHasProduct, $this->request->data);
            if ($this->SalesHasProducts->save($salesHasProduct)) {
                $this->Flash->success(__('The sales has product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sales has product could not be saved. Please, try again.'));
        }
        $this->set(compact('salesHasProduct'));
        $this->set('_serialize', ['salesHasProduct']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sales Has Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $salesHasProduct = $this->SalesHasProducts->get($id);
        if ($this->SalesHasProducts->delete($salesHasProduct)) {
            $this->Flash->success(__('The sales has product has been deleted.'));
        } else {
            $this->Flash->error(__('The sales has product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
