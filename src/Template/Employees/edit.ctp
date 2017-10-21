<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="employees form large-9 medium-8 columns content">
    <?= $this->Form->create($employee) ?>
    <fieldset>
        <legend><?= __('Editar Empleado') ?></legend>
        <?php
        echo $this->Form->input('cedula');
            echo $this->Form->input('name', ['label' => 'Nombre']);
            echo $this->Form->input('lastname', ['label' => 'Apellidos']);
            echo $this->Form->input('asegurado');
            echo $this->Form->input('telefono1');
            echo $this->Form->input('telefono2');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Editar')) ?>
    <?= $this->Form->end() ?>
</div>
