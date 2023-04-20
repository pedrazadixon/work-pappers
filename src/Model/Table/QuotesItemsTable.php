<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QuotesItems Model
 *
 * @property \App\Model\Table\QuotesTable&\Cake\ORM\Association\BelongsTo $Quotes
 *
 * @method \App\Model\Entity\QuotesItem newEmptyEntity()
 * @method \App\Model\Entity\QuotesItem newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\QuotesItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\QuotesItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\QuotesItem findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\QuotesItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\QuotesItem[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\QuotesItem|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QuotesItem saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QuotesItem[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\QuotesItem[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\QuotesItem[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\QuotesItem[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class QuotesItemsTable extends Table
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

        $this->setTable('quotes_items');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Quotes', [
            'foreignKey' => 'quote_id',
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
            ->integer('quote_id')
            ->allowEmptyString('quote_id');

        $validator
            ->scalar('description')
            ->maxLength('description', 16777215)
            ->allowEmptyString('description');

        $validator
            ->integer('hours')
            ->allowEmptyString('hours');

        $validator
            ->decimal('hour_price')
            ->allowEmptyString('hour_price');

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
        $rules->add($rules->existsIn('quote_id', 'Quotes'), ['errorField' => 'quote_id']);

        return $rules;
    }
}
