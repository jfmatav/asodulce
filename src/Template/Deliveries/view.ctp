<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Delivery'), ['action' => 'edit', $delivery->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Delivery'), ['action' => 'delete', $delivery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $delivery->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Deliveries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Delivery'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="deliveries view large-9 medium-8 columns content">
    <h3><?= h($delivery->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Supplier') ?></th>
            <td><?= $delivery->has('supplier') ? $this->Html->link($delivery->supplier->id, ['controller' => 'Suppliers', 'action' => 'view', $delivery->supplier->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $delivery->has('user') ? $this->Html->link($delivery->user->id, ['controller' => 'Users', 'action' => 'view', $delivery->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($delivery->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Peso Bruto') ?></th>
            <td><?= $this->Number->format($delivery->peso_bruto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Peso Tara') ?></th>
            <td><?= $this->Number->format($delivery->peso_tara) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Precio Tonelada') ?></th>
            <td><?= $this->Number->format($delivery->precio_tonelada) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Numero Factura') ?></th>
            <td><?= $this->Number->format($delivery->numero_factura) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Numero Recibo') ?></th>
            <td><?= $this->Number->format($delivery->numero_recibo) ?></td>
        </tr>
    </table>
</div>
