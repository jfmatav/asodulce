<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Employees Controller
 *
 * @property \App\Model\Table\EmployeesTable $Employees
 */
class EmployeesController extends AppController
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
        $employees = $this->paginate($this->Employees);

        $this->set(compact('employees'));
        $this->set('_serialize', ['employees']);
    }

    /**
     * View method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => []
        ]);

        $this->set('employee', $employee);
        $this->set('_serialize', ['employee']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employee = $this->Employees->newEntity();
        if ($this->request->is('post')) {
            $employee = $this->Employees->patchEntity($employee, $this->request->data);
            $employee['habilitado'] = true;
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('Éxito al crear el empleado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El empleado no se pudo crear. Por favor, intente de nuevo.'));
        }
        $this->set(compact('employee'));
        $this->set('_serialize', ['employee']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employee = $this->Employees->patchEntity($employee, $this->request->data);
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('Éxito al editar el empleado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El empleado no se pudo editar. Por favor, intente de nuevo.'));
        }
        $this->set(compact('employee'));
        $this->set('_serialize', ['employee']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employee = $this->Employees->get($id);
        if ($this->Employees->delete($employee)) {
            $this->Flash->success(__('Se borró el empleado.'));
        } else {
            $this->Flash->error(__('El empleado no pudo ser borrado. Por favor intente de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function deshabilitar($id = null)
    {
        $employee = $this->Employees->get($id);
        $employee['habilitado'] = false;
        if ($this->Employees->save($employee)) {
            $this->Flash->success(__('Se deshabilitado el empleado.'));
        } else {
            $this->Flash->error(__('El empleado no pudo ser deshabilitado. Por favor intente de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function habilitar($id = null)
    {
        $employee = $this->Employees->get($id);
        $employee['habilitado'] = true;
        if ($this->Employees->save($employee)) {
            $this->Flash->success(__('Se habilitado el empleado.'));
        } else {
            $this->Flash->error(__('El empleado no pudo ser habilitado. Por favor intente de nuevo.'));
        }
        
        return $this->redirect(['action' => 'index']);
    }
}
