<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Trainings Has Employee'), ['action' => 'edit', $trainingsHasEmployee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Trainings Has Employee'), ['action' => 'delete', $trainingsHasEmployee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trainingsHasEmployee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Trainings Has Employees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trainings Has Employee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trainings'), ['controller' => 'Trainings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Training'), ['controller' => 'Trainings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="trainingsHasEmployees view large-9 medium-8 columns content">
    <h3><?= h($trainingsHasEmployee->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Training') ?></th>
            <td><?= $trainingsHasEmployee->has('training') ? $this->Html->link($trainingsHasEmployee->training->id, ['controller' => 'Trainings', 'action' => 'view', $trainingsHasEmployee->training->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Employee') ?></th>
            <td><?= $trainingsHasEmployee->has('employee') ? $this->Html->link($trainingsHasEmployee->employee->name, ['controller' => 'Employees', 'action' => 'view', $trainingsHasEmployee->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quien Imparte') ?></th>
            <td><?= h($trainingsHasEmployee->quien_imparte) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($trainingsHasEmployee->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Impartida') ?></th>
            <td><?= h($trainingsHasEmployee->fecha_impartida) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Validez') ?></th>
            <td><?= h($trainingsHasEmployee->fecha_validez) ?></td>
        </tr>
    </table>
</div>
