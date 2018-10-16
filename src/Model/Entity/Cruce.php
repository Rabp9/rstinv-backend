<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cruce Entity
 *
 * @property int $id
 * @property string $codigoCruce
 * @property string $codigoPunto
 * @property string $suministro
 * @property string $descripcion
 *
 * @property \App\Model\Entity\DetalleAntena[] $detalle_antenas
 * @property \App\Model\Entity\DetallePoste[] $detalle_postes
 * @property \App\Model\Entity\DetalleSemaforo[] $detalle_semaforos
 * @property \App\Model\Entity\DetalleSwitch[] $detalle_switches
 * @property \App\Model\Entity\Reguladore[] $reguladores
 */
class Cruce extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true
    ];
}
