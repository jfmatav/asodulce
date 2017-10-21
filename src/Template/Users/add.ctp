<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Crear nuevo usuario') ?></legend>
        <?php
            echo $this->Form->input('email', ['label' => 'Correo Electrónico']);
            echo $this->Form->input('password', ['label' => 'Contraseña']);
            echo $this->Form->input('type', ['options' => $tipos, 'label' => 'Tipo']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Crear')) ?>
    <?= $this->Form->end() ?>
</div>
