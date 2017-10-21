<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TrainingsHasEmployees Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Trainings
 * @property \Cake\ORM\Association\BelongsTo $Employees
 *
 * @method \App\Model\Entity\TrainingsHasEmployee get($primaryKey, $options = [])
 * @method \App\Model\Entity\TrainingsHasEmployee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TrainingsHasEmployee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TrainingsHasEmployee|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TrainingsHasEmployee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TrainingsHasEmployee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TrainingsHasEmployee findOrCreate($search, callable $callback = null, $options = [])
 */
class TrainingsHasEmployeesTable extends Table
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

        $this->table('trainings_has_employees');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Trainings', [
            'foreignKey' => 'trainings_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Employees', [
            'foreignKey' => 'employees_id',
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
            ->date('fecha_impartida')
            ->requirePresence('fecha_impartida', 'create')
            ->notEmpty('fecha_impartida');

        $validator
            ->date('fecha_validez')
            ->allowEmpty('fecha_validez');

        $validator
            ->allowEmpty('quien_imparte');

        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

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
        $rules->add($rules->existsIn(['trainings_id'], 'Trainings'));
        $rules->add($rules->existsIn(['employees_id'], 'Employees'));

        return $rules;
    }
}
