<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SalesHasProducts Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Sales
 * @property \Cake\ORM\Association\BelongsTo $Products
 *
 * @method \App\Model\Entity\SalesHasProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\SalesHasProduct newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SalesHasProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SalesHasProduct|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SalesHasProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SalesHasProduct[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SalesHasProduct findOrCreate($search, callable $callback = null, $options = [])
 */
class SalesHasProductsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('sales_has_products');
        $this->displayField('sales_id');
        $this->primaryKey(['sales_id', 'products_id']);

        $this->belongsTo('Sales', [
            'foreignKey' => 'sales_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'products_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['sales_id'], 'Sales'));
        $rules->add($rules->existsIn(['products_id'], 'Products'));

        return $rules;
    }
}
