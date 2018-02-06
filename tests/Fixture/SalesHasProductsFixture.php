<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SalesHasProductsFixture
 *
 */
class SalesHasProductsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'sales_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'products_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_sales_has_products_products1_idx' => ['type' => 'index', 'columns' => ['products_id'], 'length' => []],
            'fk_sales_has_products_sales1_idx' => ['type' => 'index', 'columns' => ['sales_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['sales_id', 'products_id'], 'length' => []],
            'fk_sales_has_products_sales1' => ['type' => 'foreign', 'columns' => ['sales_id'], 'references' => ['sales', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_sales_has_products_products1' => ['type' => 'foreign', 'columns' => ['products_id'], 'references' => ['products', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'sales_id' => 1,
            'products_id' => 1
        ],
    ];
}
