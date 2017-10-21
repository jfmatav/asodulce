<h1>Iniciar Sesión</h1>

<?= $this->Form->create() ?>
<?= $this->Form->input('email',['label' => 'Correo electrónico']) ?>
<?= $this->Form->input('password',['label' => 'Contraseña']) ?>
<?= $this->Form->button('Iniciar Sesión', ['class' => 'btn btn-primary']) ?>
<?php //$this->Html->link('Crear nuevo usuario','/users/add', ['style' => 'float: right']);?>    
<?= $this->Form->end() ?>