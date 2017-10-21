<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Salary Advance'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="salaryAdvance index large-9 medium-8 columns content">
    <h3><?= __('Salary Advance') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cantidad') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employees_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($salaryAdvance as $salaryAdvance): ?>
            <tr>
                <td><?= $this->Number->format($salaryAdvance->id) ?></td>
                <td><?= $this->Number->format($salaryAdvance->cantidad) ?></td>
                <td><?= $salaryAdvance->has('user') ? $this->Html->link($salaryAdvance->user->id, ['controller' => 'Users', 'action' => 'view', $salaryAdvance->user->id]) : '' ?></td>
                <td><?= $salaryAdvance->has('employee') ? $this->Html->link($salaryAdvance->employee->name, ['controller' => 'Employees', 'action' => 'view', $salaryAdvance->employee->id]) : '' ?></td>
                <td><?= h($salaryAdvance->fecha) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $salaryAdvance->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $salaryAdvance->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $salaryAdvance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $salaryAdvance->id)]) ?>
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
