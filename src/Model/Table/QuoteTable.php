<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Quote Model
 *
 * @property \App\Model\Table\QuoteRequestTable&\Cake\ORM\Association\BelongsTo $QuoteRequest
 * @property \App\Model\Table\EstimatedTimeTable&\Cake\ORM\Association\BelongsTo $EstimatedTime
 *
 * @method \App\Model\Entity\Quote newEmptyEntity()
 * @method \App\Model\Entity\Quote newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Quote[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Quote get($primaryKey, $options = [])
 * @method \App\Model\Entity\Quote findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Quote patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Quote[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Quote|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Quote saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Quote[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Quote[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Quote[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Quote[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class QuoteTable extends Table
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

        $this->setTable('quote');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('QuoteRequest', [
            'foreignKey' => 'quote_request_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('EstimatedTime', [
            'foreignKey' => 'est_time_id',
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->numeric('initial_price')
            ->requirePresence('initial_price', 'create')
            ->notEmptyString('initial_price');

        $validator
            ->numeric('final_price')
            ->requirePresence('final_price', 'create')
            ->notEmptyString('final_price');

        $validator
            ->scalar('comments')
            ->maxLength('comments', 400)
            ->requirePresence('comments', 'create')
            ->notEmptyString('comments');

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
        $rules->add($rules->existsIn('quote_request_id', 'QuoteRequest'), ['errorField' => 'quote_request_id']);
        $rules->add($rules->existsIn('est_time_id', 'EstimatedTime'), ['errorField' => 'est_time_id']);

        return $rules;
    }
}
