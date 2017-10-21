<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Asodulce';
?>
<!DOCTYPE html>
<html  lang="es">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
       
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.min') ?>
    <?= $this->Html->css('asodulce') ?>
    <?= $this->Html->script(['jquery-3.2.0.min', 'bootstrap.min']); ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
     
      <?= $this->Html->image('paceno.jpg', ['alt' => 'Paceno', 'height' => '75', 'width' => '75']); ?>
    </div>
    <?php if($userLogged) { ?>
    <ul class="nav navbar-nav">
      <li>
        <?= $this->Html->link('Lista Usuarios', ['controller' => 'Users', 'action' => 'index']);?>
      </li>
      <li>
        <?= $this->Html->link('Lista Empleados', ['controller' => 'Employees', 'action' => 'index']);?>
      </li>
      <li>
          <?= $this->Html->link('Tipos de Trabajo', ['controller' => 'Jobs', 'action' => 'index']);?>
      </li>
      <li>
        <?= $this->Html->link('Lista Registros', ['controller' => 'Records', 'action' => 'index']);?>
      </li>
      <li>
        <?= $this->Html->link('Pagos', ['controller' => 'Records', 'action' => 'pagos']);?>
      </li>
      <li>
        <?= $this->Html->link('Aguinaldo', ['controller' => 'Records', 'action' => 'aguinaldo']);?>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        
      
      <li><?= $this->Html->link('Cerrar Sesión','/users/logout');?></li>
      <?php 
                    }
                    else {
                ?>
      <ul class="nav navbar-nav navbar-right">
      <li><?= $this->Html->link('Iniciar Sesión','/users/login',['class' => 'links']);?></li>
      <?php
                    }
                ?>
    </ul>
  </div>
</nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
