<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SalaryAdvanceTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SalaryAdvanceTable Test Case
 */
class SalaryAdvanceTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SalaryAdvanceTable
     */
    public $SalaryAdvance;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.salary_advance',
        'app.users',
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
        $config = TableRegistry::exists('SalaryAdvance') ? [] : ['className' => 'App\Model\Table\SalaryAdvanceTable'];
        $this->SalaryAdvance = TableRegistry::get('SalaryAdvance', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SalaryAdvance);

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
