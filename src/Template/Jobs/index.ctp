<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="jobs index large-9 medium-8 columns content">
    <h3>Trabajos</h3>
    <div class="table-responsive">
    <table class="table  table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('precio por hora') ?></th>
                <th scope="col"><?= $this->Paginator->sort('precio por extra') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jobs as $job): ?>
            <tr>
                <td><?= h($job->nombre) ?></td>
                <td><?= $this->Number->format($job->precio, [
                            'places' => 2,
                            'before' => '₡',
                            'after' => ''
                        ]); ?></td>
                <td><?= $this->Number->format($job->precio_de_extra, [
                            'places' => 2,
                            'before' => '₡',
                            'after' => ''
                        ]); ?></td>        
                <td><?= h($job->descripcion) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $job->id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <?= $this->Html->link('Nuevo tipo trabajo', ['controller' => 'Jobs', 'action' => 'add'],  ['style' => 'float: right']);?>
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
