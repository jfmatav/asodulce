

<div class="employees form large-9 medium-8 columns content">
    <?= $this->Form->create($employee) ?>
    <fieldset>
        <legend><?= __('Crear Empleado') ?></legend>
        <?php
            echo $this->Form->input('cedula', ['label' => 'Número de cédula']);
            echo $this->Form->input('name', ['label' => 'Nombre']);
            echo $this->Form->input('lastname', ['label' => 'Apellido']);
            echo $this->Form->input('asegurado');
            echo $this->Form->input('telefono1', ['label' => 'Teléfono']);
            echo $this->Form->input('telefono2', ['label' => 'Segundo Teléfono']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Crear')) ?>
    <?= $this->Form->end() ?>
</div>
