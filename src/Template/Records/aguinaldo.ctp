<div class="container">
      <?= $this->Form->create($pago) ?>
    <fieldset>
        <legend><?= __('Aguinaldo') ?></legend>
    <?php
        echo $this->Form->input('employees_id', ['options' => $employees, 'label' => 'Empleado']);
        echo 'Año';
        echo $this->Form->year('ano', ['label' => 'Año']);
    ?>
    <?= $this->Form->button(__('Calcular Aguinaldo')) ?>
    <?= $this->Form->end() ?>
</div>

<?php if ($meses) { ?>
<div class="records index large-9 medium-8 columns content">
    <h3><?= __('Registros Mensuales') ?></h3>
    <div class="table-responsive">
    <table class="table  table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('employees_id', ['label' => 'Empleado']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('mes') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($meses as $mes): ?>
            <tr>
                <td><?= $this->Html->link($mes['employee']->name . ' ' . $mes['employee']->lastname . ' ' . $mes['employee']->cedula, ['controller' => 'Employees', 'action' => 'view', $mes['employee']->id]) ?></td>
                <td><?= $mes['mes'] ?></td>
                <td><?= $this->Number->format($mes['total'], [
                            'places' => 2,
                            'before' => '₡',
                            'after' => ''
                        ]); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <h3>Total de meses: <?= $this->Number->format($aguinaldo, [
                            'places' => 2,
                            'before' => '₡',
                            'after' => ''
                        ]); ?></h3>
    <h2>Aguinaldo: <?= $this->Number->format($aguinaldo / 12, [
                            'places' => 2,
                            'before' => '₡',
                            'after' => ''
                        ]); ?></h2>
    
    <br><br>                    

<?= $this->Form->create(null, ['url' => ['controller' => 'Records', 'action' => 'reporteaguinaldo'] ]); ?>
    <input type="hidden" name="ano" value="<?= $ano ?>">
    <input type="hidden" name="employees_id" value="<?= $empleado ?>">
    <?= $this->Form->button('Imprimir') ?>
    <?= $this->Form->end() ?>
    
    <br><br><br>
</div>
<?php } ?>