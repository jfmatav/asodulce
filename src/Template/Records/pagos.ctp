<div class="container">
      <?= $this->Form->create($pago) ?>
    <fieldset>
        <legend><?= __('Pagos') ?></legend>
    <?php
        echo $this->Form->input('employees_id', ['options' => $employees, 'label' => 'Empleado']);
        //echo $this->Form->input('Desde', ['type' => 'date']);
        //echo $this->Form->input('Hasta', ['type' => 'date']);
    ?>
    Desde:
    <input type="date" name="desde">
    Hasta:
    <input type="date" name="hasta">
    <?= $this->Form->button(__('Calcular Pago')) ?>
    <?= $this->Form->end() ?>
</div>

<?php if ($records) { ?>
<div class="records index large-9 medium-8 columns content">
    <h3><?= __('Registros') ?></h3>
    <div class="table-responsive">
    <table class="table  table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employees_id', ['label' => 'Empleado']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('jobs_id', ['label' => 'Trabajo']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('precio', ['label' => 'Costo por hora']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('horas') ?></th>
                <th scope="col"><?= $this->Paginator->sort('es_extra') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($records as $record): ?>
            <tr>
                <td><?= $this->Number->format($record->id) ?></td>
                <td><?= $record->has('employee') ? $this->Html->link($record->employee->name, ['controller' => 'Employees', 'action' => 'view', $record->employee->id]) : '' ?></td>
                <td><?= $record->has('job') ? $this->Html->link($record->job->nombre, ['controller' => 'Jobs', 'action' => 'view', $record->job->id]) : '' ?></td>
                <td><?= $this->Number->format($record->precio, [
                            'places' => 2,
                            'before' => '₡',
                            'after' => ''
                ]); ?></td>
                <td><?= $this->Number->format($record->horas) ?></td>
                <td><?= $record->es_extra == true ? 'Sí' : 'No' ?></td>
                <td><?= h($record->fecha) ?></td>
                <td><?= $this->Number->format($record->total, [
                            'places' => 2,
                            'before' => '₡',
                            'after' => ''
                        ]); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    
    <h3>Total de horas: <?= $total_horas ?></h3>
    
    <h3>Salario Bruto: <?= $this->Number->format($total_ordinarias, [
                            'places' => 2,
                            'before' => '₡',
                            'after' => ''
                        ]); ?> 
                       </h3>
    <h2>Salario Neto
    <br>
    <?= $this->Number->format($total_ordinarias, [
                            'places' => 2,
                            'before' => '₡',
                            'after' => ''
                        ]); ?>
                        
                         <?php if ($asegurado){
                             echo ' - ';
                             echo $this->Number->format($total_ordinarias * 0.0984, [
                            'places' => 2,
                            'before' => '₡',
                            'after' => ''
                            ]);
                            echo ' (9.84%) = ';
                            $totalSalario = $total_ordinarias - ( $total_ordinarias * 0.0984 );
                            echo $this->Number->format($totalSalario, [
                            'places' => 2,
                            'before' => '₡',
                            'after' => ''
                            ]);
                         }
                         else {
                             $totalSalario = $total_ordinarias;
                         }
                         ?>
                         
                         
                         </h2>
    <h2>Salario a Pagar
    <br>
    <?= $this->Number->format($totalSalario, [
                            'places' => 2,
                            'before' => '₡',
                            'after' => ''
                        ]); ?>
                        +
                         <?= 
                             
                             $this->Number->format($total_extras, [
                            'places' => 2,
                            'before' => '₡',
                            'after' => ''
                            ]);
                            
                         ?>
                         
                          <?php 
                            
                            echo ' = ';
                            $totalPagar = $totalSalario + $total_extras;
                            echo $this->Number->format($totalPagar, [
                            'places' => 2,
                            'before' => '₡',
                            'after' => ''
                            ]);
                         
                         ?>
                         
                         </h2>
                        
       <br><br>                 

 <?= $this->Form->create(null, ['url' => ['controller' => 'Records', 'action' => 'reportepagos'] ]); ?>
    <input type="hidden" name="desde" value="<?= $desde ?>">
    <input type="hidden" name="hasta" value="<?= $hasta ?>">
    <input type="hidden" name="employees_id" value="<?= $empleado ?>">
    <?= $this->Form->button('Imprimir') ?>
    <?= $this->Form->end() ?>
    <br><br><br>
</div>

<?php } ?>


