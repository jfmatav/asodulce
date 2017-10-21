<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="records form large-9 medium-8 columns content">
    <?= $this->Form->create($record) ?>
    <fieldset>
        <legend><?= __('Nuevo Registro') ?></legend>
        <?php
            echo $this->Form->input('employees_id', ['options' => $employees, 'label' => 'Empleado']);
            echo $this->Form->input('horas', ['label' => 'Cantidad de horas trabajadas']);
            echo $this->Form->input('es_extra');
            echo $this->Form->input('fecha');
            echo $this->Form->input('jobs_id', ['options' => $jobs, 'label' => 'Tipo de Trabajo']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Agregar')) ?>
    <?= $this->Form->end() ?>
</div>
