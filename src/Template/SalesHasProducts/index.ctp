<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sales Has Product'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sales'), ['controller' => 'Sales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sale'), ['controller' => 'Sales', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="salesHasProducts index large-9 medium-8 columns content">
    <h3><?= __('Sales Has Products') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('sales_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('products_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($salesHasProducts as $salesHasProduct): ?>
            <tr>
                <td><?= $salesHasProduct->has('sale') ? $this->Html->link($salesHasProduct->sale->id, ['controller' => 'Sales', 'action' => 'view', $salesHasProduct->sale->id]) : '' ?></td>
                <td><?= $salesHasProduct->has('product') ? $this->Html->link($salesHasProduct->product->id, ['controller' => 'Products', 'action' => 'view', $salesHasProduct->product->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $salesHasProduct->sales_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $salesHasProduct->sales_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $salesHasProduct->sales_id], ['confirm' => __('Are you sure you want to delete # {0}?', $salesHasProduct->sales_id)]) ?>
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
