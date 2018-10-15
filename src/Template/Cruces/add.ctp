<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cruce $cruce
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cruces'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Detalle Antenas'), ['controller' => 'DetalleAntenas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Detalle Antena'), ['controller' => 'DetalleAntenas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Detalle Postes'), ['controller' => 'DetallePostes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Detalle Poste'), ['controller' => 'DetallePostes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Detalle Semaforos'), ['controller' => 'DetalleSemaforos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Detalle Semaforo'), ['controller' => 'DetalleSemaforos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Detalle Switches'), ['controller' => 'DetalleSwitches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Detalle Switch'), ['controller' => 'DetalleSwitches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reguladores'), ['controller' => 'Reguladores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reguladore'), ['controller' => 'Reguladores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cruces form large-9 medium-8 columns content">
    <?= $this->Form->create($cruce) ?>
    <fieldset>
        <legend><?= __('Add Cruce') ?></legend>
        <?php
            echo $this->Form->control('codigoCruce');
            echo $this->Form->control('codigoPunto');
            echo $this->Form->control('suministro');
            echo $this->Form->control('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
