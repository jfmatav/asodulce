<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Salary Advance'), ['action' => 'edit', $salaryAdvance->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Salary Advance'), ['action' => 'delete', $salaryAdvance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $salaryAdvance->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Salary Advance'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Salary Advance'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="salaryAdvance view large-9 medium-8 columns content">
    <h3><?= h($salaryAdvance->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $salaryAdvance->has('user') ? $this->Html->link($salaryAdvance->user->id, ['controller' => 'Users', 'action' => 'view', $salaryAdvance->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Employee') ?></th>
            <td><?= $salaryAdvance->has('employee') ? $this->Html->link($salaryAdvance->employee->name, ['controller' => 'Employees', 'action' => 'view', $salaryAdvance->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($salaryAdvance->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cantidad') ?></th>
            <td><?= $this->Number->format($salaryAdvance->cantidad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($salaryAdvance->fecha) ?></td>
        </tr>
    </table>
</div>
