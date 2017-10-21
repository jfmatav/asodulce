<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Record Entity
 *
 * @property int $jobs_id
 * @property int $horas
 * @property int $id
 * @property bool $es_extra
 * @property \Cake\I18n\Time $fecha
 * @property int $employees_id
 * @property int $total
 *
 * @property \App\Model\Entity\Job $job
 * @property \App\Model\Entity\Employee $employee
 */
class Record extends Entity
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
