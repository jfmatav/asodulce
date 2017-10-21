<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="records form large-9 medium-8 columns content">
    <?= $this->Form->create($record) ?>
    <fieldset>
        <legend><?= __('Edit Record') ?></legend>
        <?php
            echo $this->Form->input('horas');
            echo $this->Form->input('es_extra');
            echo $this->Form->input('fecha');
            echo $this->Form->input('employees_id', ['options' => $employees, 'label' => 'Empleado']);
            echo $this->Form->input('jobs_id', ['options' => $jobs, 'label' => 'Tipo de trabajo']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Editar')) ?>
    <?= $this->Form->end() ?>
</div>
