<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stone Model
 *
 * @method \App\Model\Entity\Stone newEmptyEntity()
 * @method \App\Model\Entity\Stone newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Stone[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Stone get($primaryKey, $options = [])
 * @method \App\Model\Entity\Stone findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Stone patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Stone[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Stone|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Stone saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Stone[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Stone[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Stone[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Stone[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class StoneTable extends Table
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

        $this->setTable('stone');
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
            ->scalar('stone_name')
            ->maxLength('stone_name', 30)
            ->requirePresence('stone_name', 'create')
            ->notEmptyString('stone_name');

        $validator
            ->numeric('stone_price_m2')
            ->notEmptyString('stone_price_m2');

        return $validator;
    }
}
