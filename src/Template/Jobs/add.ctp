<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="jobs form large-9 medium-8 columns content">
    <?= $this->Form->create($job) ?>
    <fieldset>
        <legend><?= __('Nuevo Tipo de Trabajo') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('precio');
            echo $this->Form->input('precio_de_extra', ['label' => 'Precio de Extra']);
            echo $this->Form->input('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Agregar')) ?>
    <?= $this->Form->end() ?>
</div>
