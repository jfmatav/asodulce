<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TrainingsHasEmployee Entity
 *
 * @property int $trainings_id
 * @property int $employees_id
 * @property \Cake\I18n\Time $fecha_impartida
 * @property \Cake\I18n\Time $fecha_validez
 * @property string $quien_imparte
 * @property int $id
 *
 * @property \App\Model\Entity\Training $training
 * @property \App\Model\Entity\Employee $employee
 */
class TrainingsHasEmployee extends Entity
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
        '*' => true,
        'id' => false
    ];
}
