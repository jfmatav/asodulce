<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Deliveries Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Suppliers
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Delivery get($primaryKey, $options = [])
 * @method \App\Model\Entity\Delivery newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Delivery[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Delivery|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Delivery patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Delivery[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Delivery findOrCreate($search, callable $callback = null, $options = [])
 */
class DeliveriesTable extends Table
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

        $this->table('deliveries');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Suppliers', [
            'foreignKey' => 'suppliers_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->numeric('peso_bruto')
            ->requirePresence('peso_bruto', 'create')
            ->notEmpty('peso_bruto');

        $validator
            ->numeric('peso_tara')
            ->requirePresence('peso_tara', 'create')
            ->notEmpty('peso_tara');

        $validator
            ->numeric('precio_tonelada')
            ->requirePresence('precio_tonelada', 'create')
            ->notEmpty('precio_tonelada');

        $validator
            ->integer('numero_factura')
            ->requirePresence('numero_factura', 'create')
            ->notEmpty('numero_factura');

        $validator
            ->integer('numero_recibo')
            ->requirePresence('numero_recibo', 'create')
            ->notEmpty('numero_recibo');

        return $validator;
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
        $rules->add($rules->existsIn(['suppliers_id'], 'Suppliers'));
        $rules->add($rules->existsIn(['users_id'], 'Users'));

        return $rules;
    }
}
