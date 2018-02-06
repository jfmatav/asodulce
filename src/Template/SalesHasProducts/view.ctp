<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sales Has Product'), ['action' => 'edit', $salesHasProduct->sales_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sales Has Product'), ['action' => 'delete', $salesHasProduct->sales_id], ['confirm' => __('Are you sure you want to delete # {0}?', $salesHasProduct->sales_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sales Has Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sales Has Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sales'), ['controller' => 'Sales', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sale'), ['controller' => 'Sales', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="salesHasProducts view large-9 medium-8 columns content">
    <h3><?= h($salesHasProduct->sales_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sale') ?></th>
            <td><?= $salesHasProduct->has('sale') ? $this->Html->link($salesHasProduct->sale->id, ['controller' => 'Sales', 'action' => 'view', $salesHasProduct->sale->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $salesHasProduct->has('product') ? $this->Html->link($salesHasProduct->product->id, ['controller' => 'Products', 'action' => 'view', $salesHasProduct->product->id]) : '' ?></td>
        </tr>
    </table>
</div>
