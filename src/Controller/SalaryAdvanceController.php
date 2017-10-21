<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SalaryAdvance Controller
 *
 * @property \App\Model\Table\SalaryAdvanceTable $SalaryAdvance
 */
class SalaryAdvanceController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow();
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Employees']
        ];
        $salaryAdvance = $this->paginate($this->SalaryAdvance);

        $this->set(compact('salaryAdvance'));
        $this->set('_serialize', ['salaryAdvance']);
    }

    /**
     * View method
     *
     * @param string|null $id Salary Advance id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $salaryAdvance = $this->SalaryAdvance->get($id, [
            'contain' => ['Users', 'Employees']
        ]);

        $this->set('salaryAdvance', $salaryAdvance);
        $this->set('_serialize', ['salaryAdvance']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $salaryAdvance = $this->SalaryAdvance->newEntity();
        if ($this->request->is('post')) {
            $salaryAdvance = $this->SalaryAdvance->patchEntity($salaryAdvance, $this->request->data);
            if ($this->SalaryAdvance->save($salaryAdvance)) {
                $this->Flash->success(__('The salary advance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The salary advance could not be saved. Please, try again.'));
        }
        $users = $this->SalaryAdvance->Users->find('list', ['limit' => 200]);
        $employees = $this->SalaryAdvance->Employees->find('list', ['limit' => 200]);
        $this->set(compact('salaryAdvance', 'users', 'employees'));
        $this->set('_serialize', ['salaryAdvance']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Salary Advance id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $salaryAdvance = $this->SalaryAdvance->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $salaryAdvance = $this->SalaryAdvance->patchEntity($salaryAdvance, $this->request->data);
            if ($this->SalaryAdvance->save($salaryAdvance)) {
                $this->Flash->success(__('The salary advance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The salary advance could not be saved. Please, try again.'));
        }
        $users = $this->SalaryAdvance->Users->find('list', ['limit' => 200]);
        $employees = $this->SalaryAdvance->Employees->find('list', ['limit' => 200]);
        $this->set(compact('salaryAdvance', 'users', 'employees'));
        $this->set('_serialize', ['salaryAdvance']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Salary Advance id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $salaryAdvance = $this->SalaryAdvance->get($id);
        if ($this->SalaryAdvance->delete($salaryAdvance)) {
            $this->Flash->success(__('The salary advance has been deleted.'));
        } else {
            $this->Flash->error(__('The salary advance could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
