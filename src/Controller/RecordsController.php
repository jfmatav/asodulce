<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Records Controller
 *
 * @property \App\Model\Table\RecordsTable $Records
 */
class RecordsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Jobs', 'Employees']
        ];
        $records = $this->paginate($this->Records);

        $this->set(compact('records'));
        $this->set('_serialize', ['records']);
    }

    /**
     * View method
     *
     * @param string|null $id Record id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $record = $this->Records->get($id, [
            'contain' => ['Jobs', 'Employees']
        ]);

        $this->set('record', $record);
        $this->set('_serialize', ['record']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $record = $this->Records->newEntity();
        if ($this->request->is('post')) {
            $record = $this->Records->patchEntity($record, $this->request->data);
            $job = $this->Records->Jobs->find()->where(['id' => $record->jobs_id])->first();
            if($record->es_extra){
                $record->total = $job->precio_de_extra * $record->horas;
            }
            else {
                $record->total = $job->precio * $record->horas;
            }
            if ($this->Records->save($record)) {
                $this->Flash->success(__('Se creó con éxito el registro.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo crear el registro. Por favor, intente de nuevo'));
        }
        $jobs = $this->Records->Jobs->find('list', ['limit' => 200]);
        
        //$employees = $this->Records->Employees->find('list', [ 'keyField' => 'id','valueField' => ['cedula','name','lastname'], 'limit' => 200]);
        $employees = $this->Records->Employees->find('list', [ 'keyField' => 'id','valueField' => 'concatenated', 'limit' => 200]);
        
        $employees
        ->select([
        'id',
        'concatenated' => $employees->func()->concat([
            'cedula' => 'literal',
            ' ',
            'name' => 'literal',
            ' ',
            'lastname' => 'literal'
        ])
        ]);
        /**foreach ($employees as $employee):
            $employee[1] = str_replace(';',' ', $employee[1]);
        endforeach;
        **/
        $this->set(compact('record', 'jobs', 'employees'));
        $this->set('_serialize', ['record']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Record id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $record = $this->Records->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $record = $this->Records->patchEntity($record, $this->request->data);
            $job = $this->Records->Jobs->find()->where(['id' => $record->jobs_id])->first();
            $record->total = $job->precio * $record->horas;
            if ($this->Records->save($record)) {
                $this->Flash->success(__('The record has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The record could not be saved. Please, try again.'));
        }
        $jobs = $this->Records->Jobs->find('list', ['limit' => 200]);
        //$employees = $this->Records->Employees->find('list', ['limit' => 200]);
         $employees = $this->Records->Employees->find('list', [ 'keyField' => 'id','valueField' => 'concatenated', 'limit' => 200]);
        
        $employees
        ->select([
        'id',
        'concatenated' => $employees->func()->concat([
            'cedula' => 'literal',
            ' ',
            'name' => 'literal',
            ' ',
            'lastname' => 'literal'
        ])
        ]);
        $this->set(compact('record', 'jobs', 'employees'));
        $this->set('_serialize', ['record']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Record id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $record = $this->Records->get($id);
        if ($this->Records->delete($record)) {
            $this->Flash->success(__('The record has been deleted.'));
        } else {
            $this->Flash->error(__('The record could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function pagos(){
        
        $pago = -1; 
        $records = null;
        $desde = null;
        $hasta = null;
        $total = 0;
        $total_extras = 0;
        $total_ordinarias = 0;
        $asegurado = false;
        $empleado = null; 
        $total_horas = 0;
        
        if ($this->request->is('post')) {
            $empleado = $this->request->data('employees_id');
            
            $desde = $this->request->data('desde');
            $hasta = $this->request->data('hasta');
            
            /**
            $anoDesde = $this->request->data('Desde')['year'];
            $mesDesde = $this->request->data('Desde')['month'];
            $diaDesde = $this->request->data('Desde')['day'];
            
            $anoHasta = $this->request->data('Hasta')['year'];
            $mesHasta = $this->request->data('Hasta')['month'];
            $diaHasta = $this->request->data('Hasta')['day'];

            $desde = $anoDesde . '-' .  $mesDesde . '-' . $diaDesde;
            $hasta = $anoHasta . '-' .  $mesHasta . '-' . $diaHasta;
            **/
            
            $prueba = $this->Records->find('all')->where(function($exp) use($desde,$hasta) {
                return $exp->between('fecha', $desde, $hasta);
            })->andWhere(['employees_id' => $empleado]);
            
            /**$prueba = $this->Records->find('all', array(
                'conditions' => array(
                        'Records.employees_id '=> $empleado,
                        'MONTH(fecha) ='=> $mes,
                        'YEAR(fecha) =' => $ano
                ),
            )
            );
            **/
            
        
            $data = $prueba->toArray();
            
            $records = [];
            foreach  ($data as $record):
                $record = $this->Records->get($record->id, [
                'contain' => ['Jobs', 'Employees']
                ]);
                $record['precio'] = $record->total / $record->horas;
                $total_horas += $record->horas;
                array_push($records, $record);
            endforeach;
            
            $totalPago = 0;
            
            foreach  ($data as $record):
                if($record->es_extra){
                    $total_extras += $record->total;
                }
                else {
                    if ($record->horas <= 8){
                        $total_ordinarias += $record->total;
                    }
                    else {
                        $costo_hora = $record->total / $record->horas;
                        $total_ordinarias += $costo_hora * 8;
                        $total_extras += $costo_hora * ($record->horas - 8);
                    }
                }
            endforeach;
            
            
            //$total += $totalPago;
            
            $cobrador = $this->Records->Employees->find('all')->where(['id' => $empleado])->first();
            $asegurado = $cobrador->asegurado;
        
        }
        
        //$employees = $this->Records->Employees->find('list', [ 'keyField' => 'id','valueField' => ['cedula','name','lastname'], 'limit' => 200]);
        $employees = $this->Records->Employees->find('list', [ 'keyField' => 'id','valueField' => 'concatenated', 'limit' => 200])->where(['habilitado' => true]);
        
        $employees
        ->select([
        'id',
        'concatenated' => $employees->func()->concat([
            'cedula' => 'literal',
            ' ',
            'name' => 'literal',
            ' ',
            'lastname' => 'literal'
        ])
        ]);
        /**foreach ($employees as $employee):
            $employee[1] = str_replace(';',' ', $employee[1]);
        endforeach;
        **/
        //$meses =   [ '01' => 'Enero','02' => 'Febrero', '03' => 'Marzo', '04' => 'Abril',
        //'05' => 'Mayo', '06' => 'Junio', '07' => 'Julio', '08' => 'Agosto', '09' => 'Septiembre', 
        //'10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre']  ;
        
       
        
        $this->set(compact('employees', 'desde', 'hasta', 'pago', 'records', 'total', 'asegurado', 'empleado', 'total_extras', 'total_ordinarias', 'total_horas'));
    }
    
    public function aguinaldo(){
        
        $pago = -1;
        $meses = null;
        $empleado = null; 
        $ano = null;
        
        if ($this->request->is('post')) {
            $empleado = $this->request->data('employees_id');
            $ano = $this->request->data('ano')['year'];
            $aguinaldo = 0;
            
            $losMeses =   ['01' => 'Enero','02' => 'Febrero', '03' => 'Marzo', '04' => 'Abril',
                        '05' => 'Mayo', '06' => 'Junio', '07' => 'Julio', '08' => 'Agosto', '09' => 'Septiembre', 
                        '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre'];
            
            $meses = [];
            
            for($x = 1; $x <= 12; $x++){
                $prueba = $this->Records->find('all', array(
                    'conditions' => array(
                        'Records.employees_id '=> $empleado,
                        'MONTH(fecha) ='=> $x,
                        'YEAR(fecha) =' => $ano
                        ),
                    )
                );
                
                $data = $prueba->toArray();
                $totalMes = 0;
                foreach  ($data as $record):
                    $totalMes += $record->total;
                endforeach;
                if($x < 10){
                    $mes = ['mes' => $losMeses['0' . $x], 'total' => $totalMes, 'employee' => $this->Records->Employees->find()->where(['id' => $empleado])->first()];
                }
                else {
                    $mes = ['mes' => $losMeses[$x], 'total' => $totalMes, 'employee' => $this->Records->Employees->find()->where(['id' => $empleado])->first()];
                }
                
                array_push($meses, $mes);
                $aguinaldo += $totalMes;
                
            }
            
            //$aguinaldo = $aguinaldo / 12;
        
        }
        
        $employees = $this->Records->Employees->find('list', [ 'keyField' => 'id','valueField' => 'concatenated', 'limit' => 200]);
        
        $employees
        ->select([
        'id',
        'concatenated' => $employees->func()->concat([
            'cedula' => 'literal',
            ' ',
            'name' => 'literal',
            ' ',
            'lastname' => 'literal'
        ])
        ]);
        
        
        $this->set(compact('employees', 'meses', 'pago', 'records', 'aguinaldo', 'empleado', 'ano'));
    }
    
    public function reportepagos(){

        $pago = -1; 
        $records = null;
        $desde = null;
        $hasta = null;
        $total = 0;
        $asegurado = false;
        $empleado = null; 
        $total_ordinarias = 0;
        $total_extras = 0;
        $total_horas = 0;
        
        if ($this->request->is('post')) {
            
            $empleado = $this->request->data('employees_id');
            
            $desde = $this->request->data('desde');
            $hasta = $this->request->data('hasta');
            
            /**
            $anoDesde = $this->request->data('Desde')['year'];
            $mesDesde = $this->request->data('Desde')['month'];
            $diaDesde = $this->request->data('Desde')['day'];
            
            $anoHasta = $this->request->data('Hasta')['year'];
            $mesHasta = $this->request->data('Hasta')['month'];
            $diaHasta = $this->request->data('Hasta')['day'];

            $desde = $anoDesde . '-' .  $mesDesde . '-' . $diaDesde;
            $hasta = $anoHasta . '-' .  $mesHasta . '-' . $diaHasta;
            **/
            
            $prueba = $this->Records->find('all')->where(function($exp) use($desde,$hasta) {
                return $exp->between('fecha', $desde, $hasta);
            })->andWhere(['employees_id' => $empleado]);
            
            /**$prueba = $this->Records->find('all', array(
                'conditions' => array(
                        'Records.employees_id '=> $empleado,
                        'MONTH(fecha) ='=> $mes,
                        'YEAR(fecha) =' => $ano
                ),
            )
            );
            **/
            
        
            $data = $prueba->toArray();
            
            $records = [];
            foreach  ($data as $record):
                $record = $this->Records->get($record->id, [
                'contain' => ['Jobs', 'Employees']
                ]);
                $record['precio'] = $record->total / $record->horas;
                $total_horas += $record->horas;
                array_push($records, $record);
            endforeach;
            
            $totalPago = 0;
            foreach  ($data as $record):
                if($record->es_extra){
                    $total_extras += $record->total;
                }
                else {
                    if ($record->horas <= 8){
                        $total_ordinarias += $record->total;
                    }
                    else {
                        $costo_hora = $record->total / $record->horas;
                        $total_ordinarias += $costo_hora * 8;
                        $total_extras += $costo_hora * ($record->horas - 8);
                    }
                }
            endforeach;
            
            
            $total += $totalPago;
            
            $cobrador = $this->Records->Employees->find('all')->where(['id' => $empleado])->first();
            $asegurado = $cobrador->asegurado;
        
        }
        
        $this->set(compact('desde', 'hasta', 'pago', 'records', 'total', 'asegurado', 'empleado', 'total_extras', 'total_ordinarias','total_horas'));
    }
    
    public function reporteaguinaldo(){
        $pago = -1;
        $meses = null;
        $empleado = null;
        $ano = null;
        
        if ($this->request->is('post')) {
            $empleado = $this->request->data('employees_id');
            $ano = $this->request->data('ano');
            $aguinaldo = 0;
            
            $losMeses =   ['01' => 'Enero','02' => 'Febrero', '03' => 'Marzo', '04' => 'Abril',
                        '05' => 'Mayo', '06' => 'Junio', '07' => 'Julio', '08' => 'Agosto', '09' => 'Septiembre', 
                        '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre'];
            
            $meses = [];
            
            for($x = 1; $x <= 12; $x++){
                $prueba = $this->Records->find('all', array(
                    'conditions' => array(
                        'Records.employees_id '=> $empleado,
                        'MONTH(fecha) ='=> $x,
                        'YEAR(fecha) =' => $ano
                        ),
                    )
                );
                
                $data = $prueba->toArray();
                $totalMes = 0;
                foreach  ($data as $record):
                    $totalMes += $record->total;
                endforeach;
                if($x < 10){
                    $mes = ['mes' => $losMeses['0' . $x], 'total' => $totalMes, 'employee' => $this->Records->Employees->find()->where(['id' => $empleado])->first()];
                }
                else {
                    $mes = ['mes' => $losMeses[$x], 'total' => $totalMes, 'employee' => $this->Records->Employees->find()->where(['id' => $empleado])->first()];
                }
                
                array_push($meses, $mes);
                $aguinaldo += $totalMes;
                
            }
            
            //$aguinaldo = $aguinaldo / 12;
        
        }
        
        $employees = $this->Records->Employees->find('list', [ 'keyField' => 'id','valueField' => 'concatenated', 'limit' => 200]);
        
        $employees
        ->select([
        'id',
        'concatenated' => $employees->func()->concat([
            'cedula' => 'literal',
            ' ',
            'name' => 'literal',
            ' ',
            'lastname' => 'literal'
        ])
        ]);
        
        
        $this->set(compact('employees', 'meses', 'pago', 'records', 'aguinaldo', 'empleado', 'ano'));
    }
    
    public function initialize()
{
	parent::initialize();
	$this->loadComponent('RequestHandler');
}
}


