<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="records index large-9 medium-8 columns content">
    <h3><?= __('Registros') ?></h3>
    <div class="table-responsive">
    <table class="table  table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employees_id', ['label' => 'Empleado']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('jobs_id', ['label' => 'Trabajo']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('horas') ?></th>
                <th scope="col"><?= $this->Paginator->sort('es_extra') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total', ['label' => 'Salario Bruto Diario']) ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($records as $record): ?>
            <tr>
                <td><?= $this->Number->format($record->id) ?></td>
                <td><?= $record->has('employee') ? $this->Html->link($record->employee->name, ['controller' => 'Employees', 'action' => 'view', $record->employee->id]) : '' ?></td>
                <td><?= $record->has('job') ? $this->Html->link($record->job->nombre, ['controller' => 'Jobs', 'action' => 'view', $record->job->id]) : '' ?></td>
                <td><?= $this->Number->format($record->horas) ?></td>
                <td><?= $record->es_extra == true ? 'Sí' : 'No' ?></td>
                <td><?= h($record->fecha) ?></td>
                <td><?= $this->Number->format($record->total, [
                            'places' => 2,
                            'before' => '₡',
                            'after' => ''
                        ]); ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $record->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $record->id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $record->id], ['confirm' => __('Are you sure you want to delete # {0}?', $record->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <?= $this->Html->link('Nuevo Registro', ['controller' => 'Records', 'action' => 'add'],  ['style' => 'float: right']);?>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primero')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} de {{count}} en total')]) ?></p>
    </div>
</div>
