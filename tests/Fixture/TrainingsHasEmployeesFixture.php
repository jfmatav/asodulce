<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TrainingsHasEmployeesFixture
 *
 */
class TrainingsHasEmployeesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'trainings_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'employees_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'fecha_impartida' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'fecha_validez' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'quien_imparte' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        '_indexes' => [
            'fk_trainings_has_employees_employees1_idx' => ['type' => 'index', 'columns' => ['employees_id'], 'length' => []],
            'fk_trainings_has_employees_trainings1_idx' => ['type' => 'index', 'columns' => ['trainings_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_trainings_has_employees_trainings1' => ['type' => 'foreign', 'columns' => ['trainings_id'], 'references' => ['trainings', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_trainings_has_employees_employees1' => ['type' => 'foreign', 'columns' => ['employees_id'], 'references' => ['employees', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'trainings_id' => 1,
            'employees_id' => 1,
            'fecha_impartida' => '2017-04-07',
            'fecha_validez' => '2017-04-07',
            'quien_imparte' => 'Lorem ipsum dolor sit amet',
            'id' => 1
        ],
    ];
}
