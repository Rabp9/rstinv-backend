<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cruce $cruce
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cruce'), ['action' => 'edit', $cruce->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cruce'), ['action' => 'delete', $cruce->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cruce->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cruces'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cruce'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Detalle Antenas'), ['controller' => 'DetalleAntenas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Detalle Antena'), ['controller' => 'DetalleAntenas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Detalle Postes'), ['controller' => 'DetallePostes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Detalle Poste'), ['controller' => 'DetallePostes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Detalle Semaforos'), ['controller' => 'DetalleSemaforos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Detalle Semaforo'), ['controller' => 'DetalleSemaforos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Detalle Switches'), ['controller' => 'DetalleSwitches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Detalle Switch'), ['controller' => 'DetalleSwitches', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reguladores'), ['controller' => 'Reguladores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reguladore'), ['controller' => 'Reguladores', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cruces view large-9 medium-8 columns content">
    <h3><?= h($cruce->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('CodigoCruce') ?></th>
            <td><?= h($cruce->codigoCruce) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CodigoPunto') ?></th>
            <td><?= h($cruce->codigoPunto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Suministro') ?></th>
            <td><?= h($cruce->suministro) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($cruce->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cruce->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Detalle Antenas') ?></h4>
        <?php if (!empty($cruce->detalle_antenas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Cruce Id') ?></th>
                <th scope="col"><?= __('Antena Id') ?></th>
                <th scope="col"><?= __('Poe Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cruce->detalle_antenas as $detalleAntenas): ?>
            <tr>
                <td><?= h($detalleAntenas->id) ?></td>
                <td><?= h($detalleAntenas->cruce_id) ?></td>
                <td><?= h($detalleAntenas->antena_id) ?></td>
                <td><?= h($detalleAntenas->poe_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DetalleAntenas', 'action' => 'view', $detalleAntenas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DetalleAntenas', 'action' => 'edit', $detalleAntenas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DetalleAntenas', 'action' => 'delete', $detalleAntenas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detalleAntenas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Detalle Postes') ?></h4>
        <?php if (!empty($cruce->detalle_postes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Cruce Id') ?></th>
                <th scope="col"><?= __('Poste Id') ?></th>
                <th scope="col"><?= __('Cantidad') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cruce->detalle_postes as $detallePostes): ?>
            <tr>
                <td><?= h($detallePostes->id) ?></td>
                <td><?= h($detallePostes->cruce_id) ?></td>
                <td><?= h($detallePostes->poste_id) ?></td>
                <td><?= h($detallePostes->cantidad) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DetallePostes', 'action' => 'view', $detallePostes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DetallePostes', 'action' => 'edit', $detallePostes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DetallePostes', 'action' => 'delete', $detallePostes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detallePostes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Detalle Semaforos') ?></h4>
        <?php if (!empty($cruce->detalle_semaforos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Semaforo Id') ?></th>
                <th scope="col"><?= __('Cruce Id') ?></th>
                <th scope="col"><?= __('Cantidad') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cruce->detalle_semaforos as $detalleSemaforos): ?>
            <tr>
                <td><?= h($detalleSemaforos->id) ?></td>
                <td><?= h($detalleSemaforos->semaforo_id) ?></td>
                <td><?= h($detalleSemaforos->cruce_id) ?></td>
                <td><?= h($detalleSemaforos->cantidad) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DetalleSemaforos', 'action' => 'view', $detalleSemaforos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DetalleSemaforos', 'action' => 'edit', $detalleSemaforos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DetalleSemaforos', 'action' => 'delete', $detalleSemaforos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detalleSemaforos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Detalle Switches') ?></h4>
        <?php if (!empty($cruce->detalle_switches)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Cruce Id') ?></th>
                <th scope="col"><?= __('Switch Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cruce->detalle_switches as $detalleSwitches): ?>
            <tr>
                <td><?= h($detalleSwitches->id) ?></td>
                <td><?= h($detalleSwitches->cruce_id) ?></td>
                <td><?= h($detalleSwitches->switch_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DetalleSwitches', 'action' => 'view', $detalleSwitches->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DetalleSwitches', 'action' => 'edit', $detalleSwitches->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DetalleSwitches', 'action' => 'delete', $detalleSwitches->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detalleSwitches->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reguladores') ?></h4>
        <?php if (!empty($cruce->reguladores)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Cruce Id') ?></th>
                <th scope="col"><?= __('Fuente Id') ?></th>
                <th scope="col"><?= __('Serie') ?></th>
                <th scope="col"><?= __('Marca') ?></th>
                <th scope="col"><?= __('Modelo') ?></th>
                <th scope="col"><?= __('CantidadAntenas') ?></th>
                <th scope="col"><?= __('FechaFab') ?></th>
                <th scope="col"><?= __('Medida') ?></th>
                <th scope="col"><?= __('Color') ?></th>
                <th scope="col"><?= __('CantidadTGrupos') ?></th>
                <th scope="col"><?= __('Observaciones') ?></th>
                <th scope="col"><?= __('FocoEstado') ?></th>
                <th scope="col"><?= __('DetectorEstaqdo') ?></th>
                <th scope="col"><?= __('EspumaEstado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cruce->reguladores as $reguladores): ?>
            <tr>
                <td><?= h($reguladores->id) ?></td>
                <td><?= h($reguladores->cruce_id) ?></td>
                <td><?= h($reguladores->fuente_id) ?></td>
                <td><?= h($reguladores->serie) ?></td>
                <td><?= h($reguladores->marca) ?></td>
                <td><?= h($reguladores->modelo) ?></td>
                <td><?= h($reguladores->cantidadAntenas) ?></td>
                <td><?= h($reguladores->fechaFab) ?></td>
                <td><?= h($reguladores->medida) ?></td>
                <td><?= h($reguladores->color) ?></td>
                <td><?= h($reguladores->cantidadTGrupos) ?></td>
                <td><?= h($reguladores->observaciones) ?></td>
                <td><?= h($reguladores->focoEstado) ?></td>
                <td><?= h($reguladores->detectorEstaqdo) ?></td>
                <td><?= h($reguladores->espumaEstado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reguladores', 'action' => 'view', $reguladores->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reguladores', 'action' => 'edit', $reguladores->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reguladores', 'action' => 'delete', $reguladores->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reguladores->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
