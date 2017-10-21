<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="jobs view large-9 medium-8 columns content">
    <h3><?= h($job->nombre) ?></h3>
    <div class="table-responsive">
    <table class="table  table-striped">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($job->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripción') ?></th>
            <td><?= h($job->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Precio') ?></th>
            <td><?= $this->Number->format($job->precio, [
                            'places' => 2,
                            'before' => '₡',
                            'after' => ''
                        ]); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Extra') ?></th>
            <td><?= $this->Number->format($job->precio_de_extra, [
                            'places' => 2,
                            'before' => '₡',
                            'after' => ''
                        ]); ?></td>
        </tr>
    </table>
</div>
</div>
