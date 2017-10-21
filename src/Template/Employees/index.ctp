
<div class="container">
    <h3>Empleados</h3>
    <div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('cedula', ['label' => 'Cédula']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('name', ['label' => 'Nombre']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('lastname', ['label' => 'Apellidos']) ?></th>
                <?php if (!$auditor) { ?>
                <th scope="col"><?= $this->Paginator->sort('asegurado') ?></th>
                <?php } ?>
                <th scope="col"><?= $this->Paginator->sort('telefono1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefono2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('habilitado') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee): ?>
            <tr>
                <?php if(!$auditor || ($auditor && $employee->asegurado)) { ?>
                <td><?= h($employee->cedula) ?></td>
                <td><?= h($employee->name) ?></td>
                <td><?= h($employee->lastname) ?></td>
                <?php if (!$auditor) { ?>
                <td><?= $employee->asegurado == true ? 'Sí' : 'No' ?></td>
                <?php } ?>
                <td><?= h($employee->telefono1) ?></td>
                <td><?= h($employee->telefono2) ?></td>
                <td><?= $employee->habilitado == true ? 'Sí' : 'No' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $employee->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $employee->id]) ?>
                    <?php if ($employee->habilitado) { ?>
                    <?= $this->Form->postLink(__('Deshabilitar'), ['action' => 'deshabilitar', $employee->id], ['confirm' => __('Seguro que desea deshabilitar el empleado {0}?', $employee->name)]) ?>
                    <?php } else { ?>
                    <?= $this->Form->postLink(__('Habilitar'), ['action' => 'habilitar', $employee->id], ['confirm' => __('Seguro que desea habilitar el empleado {0}?', $employee->name)]) ?>
                    <?php } ?>
                </td>
                <?php } ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    </div>
    <?= $this->Html->link('Nuevo Empleado', ['controller' => 'Employees', 'action' => 'add'],  ['style' => 'float: right']);?>
    
    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 container"
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
    <?php if(false) { ?>
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 container">
        <div style="margin-top: 50px;">
            <?= $this->Form->create(null, ['url' => ['controller' => 'Employees', 'action' => 'reportempleados'] ]); ?>
            <?= $this->Form->button('Reporte de Empleados') ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <?php } ?>
