<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Trainings Has Employees'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Trainings'), ['controller' => 'Trainings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Training'), ['controller' => 'Trainings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="trainingsHasEmployees form large-9 medium-8 columns content">
    <?= $this->Form->create($trainingsHasEmployee) ?>
    <fieldset>
        <legend><?= __('Add Trainings Has Employee') ?></legend>
        <?php
            echo $this->Form->input('trainings_id', ['options' => $trainings]);
            echo $this->Form->input('employees_id', ['options' => $employees]);
            echo $this->Form->input('fecha_impartida');
            echo $this->Form->input('fecha_validez', ['empty' => true]);
            echo $this->Form->input('quien_imparte');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
