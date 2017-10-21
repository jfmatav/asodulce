<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TrainingsHasEmployees Controller
 *
 * @property \App\Model\Table\TrainingsHasEmployeesTable $TrainingsHasEmployees
 */
class TrainingsHasEmployeesController extends AppController
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
            'contain' => ['Trainings', 'Employees']
        ];
        $trainingsHasEmployees = $this->paginate($this->TrainingsHasEmployees);

        $this->set(compact('trainingsHasEmployees'));
        $this->set('_serialize', ['trainingsHasEmployees']);
    }

    /**
     * View method
     *
     * @param string|null $id Trainings Has Employee id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $trainingsHasEmployee = $this->TrainingsHasEmployees->get($id, [
            'contain' => ['Trainings', 'Employees']
        ]);

        $this->set('trainingsHasEmployee', $trainingsHasEmployee);
        $this->set('_serialize', ['trainingsHasEmployee']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $trainingsHasEmployee = $this->TrainingsHasEmployees->newEntity();
        if ($this->request->is('post')) {
            $trainingsHasEmployee = $this->TrainingsHasEmployees->patchEntity($trainingsHasEmployee, $this->request->data);
            if ($this->TrainingsHasEmployees->save($trainingsHasEmployee)) {
                $this->Flash->success(__('The trainings has employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trainings has employee could not be saved. Please, try again.'));
        }
        $trainings = $this->TrainingsHasEmployees->Trainings->find('list', ['limit' => 200]);
        $employees = $this->TrainingsHasEmployees->Employees->find('list', ['limit' => 200]);
        $this->set(compact('trainingsHasEmployee', 'trainings', 'employees'));
        $this->set('_serialize', ['trainingsHasEmployee']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Trainings Has Employee id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trainingsHasEmployee = $this->TrainingsHasEmployees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trainingsHasEmployee = $this->TrainingsHasEmployees->patchEntity($trainingsHasEmployee, $this->request->data);
            if ($this->TrainingsHasEmployees->save($trainingsHasEmployee)) {
                $this->Flash->success(__('The trainings has employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trainings has employee could not be saved. Please, try again.'));
        }
        $trainings = $this->TrainingsHasEmployees->Trainings->find('list', ['limit' => 200]);
        $employees = $this->TrainingsHasEmployees->Employees->find('list', ['limit' => 200]);
        $this->set(compact('trainingsHasEmployee', 'trainings', 'employees'));
        $this->set('_serialize', ['trainingsHasEmployee']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Trainings Has Employee id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trainingsHasEmployee = $this->TrainingsHasEmployees->get($id);
        if ($this->TrainingsHasEmployees->delete($trainingsHasEmployee)) {
            $this->Flash->success(__('The trainings has employee has been deleted.'));
        } else {
            $this->Flash->error(__('The trainings has employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
