<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecordsJobsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecordsJobsTable Test Case
 */
class RecordsJobsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RecordsJobsTable
     */
    public $RecordsJobs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.records_jobs',
        'app.records',
        'app.employees',
        'app.jobs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RecordsJobs') ? [] : ['className' => 'App\Model\Table\RecordsJobsTable'];
        $this->RecordsJobs = TableRegistry::get('RecordsJobs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RecordsJobs);

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
