<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="row">
    <h3>Empleado</h3>
    <div class="table-responsive">
    <table class="table table-striped">
        <tr>
            <th scope="row"><?= __('Cédula') ?></th>
            <td><?= h($employee->cedula) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($employee->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lastname') ?></th>
            <td><?= h($employee->lastname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefono1') ?></th>
            <td><?= h($employee->telefono1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefono2') ?></th>
            <td><?= h($employee->telefono2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Asegurado') ?></th>
            <td><?= $employee->asegurado ? __('Sí') : __('No'); ?></td>
        </tr>
    </table>
    </div>
</div>
