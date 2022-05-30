<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QuoteRequest Model
 *
 * @property \App\Model\Table\StatusTable&\Cake\ORM\Association\BelongsTo $Status
 * @property \App\Model\Table\StoneTable&\Cake\ORM\Association\BelongsTo $Stone
 *
 * @method \App\Model\Entity\QuoteRequest newEmptyEntity()
 * @method \App\Model\Entity\QuoteRequest newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\QuoteRequest[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\QuoteRequest get($primaryKey, $options = [])
 * @method \App\Model\Entity\QuoteRequest findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\QuoteRequest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\QuoteRequest[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\QuoteRequest|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QuoteRequest saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QuoteRequest[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\QuoteRequest[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\QuoteRequest[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\QuoteRequest[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class QuoteRequestTable extends Table
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

        $this->setTable('quote_request');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Status', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('Stone', [
            'foreignKey' => 'stone_type',
            'joinType' => 'INNER',
        ]);
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
            ->allowEmptyString('id', null,'create');

        $validator
            ->date('quote_date')
            ->allowEmptyDate('quote_date',null,'create');

        $validator
            ->scalar('cust_name')
            ->requirePresence('cust_name', 'create')
            ->notEmptyString('cust_name');
        $validator
            ->scalar('cust_email')
            ->maxLength('cust_email', 100)
            ->requirePresence('cust_email', 'create')
            ->notEmptyString('cust_email');

        $validator
            ->scalar('cust_phone')
            ->requirePresence('cust_phone', 'create')
            ->notEmptyString('cust_phone');

        $validator
            ->scalar('street_number')
            ->maxLength('street_number', 10)
            ->requirePresence('street_number', 'create')
            ->notEmptyString('street_number');

        $validator
            ->scalar('street_name')
            ->maxLength('street_name', 25)
            ->requirePresence('street_name', 'create')
            ->notEmptyString('street_name');

        $validator
            ->scalar('suburb')
            ->maxLength('suburb', 25)
            ->requirePresence('suburb', 'create')
            ->notEmptyString('suburb');

        $validator
            ->numeric('postcode')
            ->maxLength('postcode', 4)
            ->requirePresence('postcode', 'create')
            ->notEmptyString('postcode');

        $validator
            ->scalar('state')
            ->maxLength('state', 3)
            ->requirePresence('state', 'create')
            ->notEmptyString('state');


        $validator
            ->scalar('stone_type')
            ->requirePresence('stone_type', 'create')
            ->notEmptyString('stone_type');

        $validator
            ->integer('length')
            ->requirePresence('length', 'create')
            ->notEmptyString('length');

        $validator
            ->integer('width')
            ->requirePresence('width', 'create')
            ->notEmptyString('width');


        $validator
            ->integer('thickness')
            ->requirePresence('thickness', 'create')
            ->notEmptyString('thickness');


        $validator
            ->integer('no_sink_cut')
            ->requirePresence('no_sink_cut', 'create')
            ->notEmptyString('no_sink_cut');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('status_id', 'Status'), ['errorField' => 'status_id']);
        $rules->add($rules->existsIn('stone_type', 'Stone'), ['errorField' => 'stone_type']);

        return $rules;
    }
}
