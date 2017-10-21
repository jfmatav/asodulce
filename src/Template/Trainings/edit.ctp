<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $training->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $training->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Trainings'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="trainings form large-9 medium-8 columns content">
    <?= $this->Form->create($training) ?>
    <fieldset>
        <legend><?= __('Edit Training') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
