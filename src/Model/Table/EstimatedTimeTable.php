<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EstimatedTime Model
 *
 * @method \App\Model\Entity\EstimatedTime newEmptyEntity()
 * @method \App\Model\Entity\EstimatedTime newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\EstimatedTime[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EstimatedTime get($primaryKey, $options = [])
 * @method \App\Model\Entity\EstimatedTime findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\EstimatedTime patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EstimatedTime[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\EstimatedTime|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EstimatedTime saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EstimatedTime[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EstimatedTime[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\EstimatedTime[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EstimatedTime[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class EstimatedTimeTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('estimated_time');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('est_time')
            ->maxLength('est_time', 50)
            ->requirePresence('est_time', 'create')
            ->notEmptyString('est_time');

        return $validator;
    }
}
