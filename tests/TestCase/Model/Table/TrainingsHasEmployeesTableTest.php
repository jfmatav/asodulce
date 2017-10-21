<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TrainingsHasEmployeesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TrainingsHasEmployeesTable Test Case
 */
class TrainingsHasEmployeesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TrainingsHasEmployeesTable
     */
    public $TrainingsHasEmployees;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.trainings_has_employees',
        'app.trainings',
        'app.employees'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TrainingsHasEmployees') ? [] : ['className' => 'App\Model\Table\TrainingsHasEmployeesTable'];
        $this->TrainingsHasEmployees = TableRegistry::get('TrainingsHasEmployees', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TrainingsHasEmployees);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
