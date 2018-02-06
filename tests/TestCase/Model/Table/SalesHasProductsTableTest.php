<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SalesHasProductsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SalesHasProductsTable Test Case
 */
class SalesHasProductsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SalesHasProductsTable
     */
    public $SalesHasProducts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sales_has_products',
        'app.sales',
        'app.users',
        'app.products'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SalesHasProducts') ? [] : ['className' => 'App\Model\Table\SalesHasProductsTable'];
        $this->SalesHasProducts = TableRegistry::get('SalesHasProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SalesHasProducts);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
