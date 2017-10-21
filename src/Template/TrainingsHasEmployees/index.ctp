<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Trainings Has Employee'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Trainings'), ['controller' => 'Trainings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Training'), ['controller' => 'Trainings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="trainingsHasEmployees index large-9 medium-8 columns content">
    <h3><?= __('Trainings Has Employees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('trainings_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employees_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_impartida') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_validez') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quien_imparte') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trainingsHasEmployees as $trainingsHasEmployee): ?>
            <tr>
                <td><?= $trainingsHasEmployee->has('training') ? $this->Html->link($trainingsHasEmployee->training->id, ['controller' => 'Trainings', 'action' => 'view', $trainingsHasEmployee->training->id]) : '' ?></td>
                <td><?= $trainingsHasEmployee->has('employee') ? $this->Html->link($trainingsHasEmployee->employee->name, ['controller' => 'Employees', 'action' => 'view', $trainingsHasEmployee->employee->id]) : '' ?></td>
                <td><?= h($trainingsHasEmployee->fecha_impartida) ?></td>
                <td><?= h($trainingsHasEmployee->fecha_validez) ?></td>
                <td><?= h($trainingsHasEmployee->quien_imparte) ?></td>
                <td><?= $this->Number->format($trainingsHasEmployee->id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $trainingsHasEmployee->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $trainingsHasEmployee->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $trainingsHasEmployee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trainingsHasEmployee->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
