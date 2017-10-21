<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RecordsJobsFixture
 *
 */
class RecordsJobsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'records_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'jobs_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'horas' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'es_extra' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_records_has_jobs_jobs1_idx' => ['type' => 'index', 'columns' => ['jobs_id'], 'length' => []],
            'fk_records_has_jobs_records1_idx' => ['type' => 'index', 'columns' => ['records_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_records_has_jobs_records1' => ['type' => 'foreign', 'columns' => ['records_id'], 'references' => ['records', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_records_has_jobs_jobs1' => ['type' => 'foreign', 'columns' => ['jobs_id'], 'references' => ['jobs', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'records_id' => 1,
            'jobs_id' => 1,
            'horas' => 1,
            'id' => 1,
            'es_extra' => 1
        ],
    ];
}
