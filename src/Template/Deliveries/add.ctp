<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Deliveries'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deliveries form large-9 medium-8 columns content">
    <?= $this->Form->create($delivery) ?>
    <fieldset>
        <legend><?= __('Add Delivery') ?></legend>
        <?php
            echo $this->Form->input('peso_bruto');
            echo $this->Form->input('peso_tara');
            echo $this->Form->input('suppliers_id', ['options' => $suppliers]);
            echo $this->Form->input('users_id', ['options' => $users]);
            echo $this->Form->input('precio_tonelada');
            echo $this->Form->input('numero_factura');
            echo $this->Form->input('numero_recibo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
