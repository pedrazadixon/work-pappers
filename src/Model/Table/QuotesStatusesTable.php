<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QuotesStatuses Model
 *
 * @method \App\Model\Entity\QuotesStatus newEmptyEntity()
 * @method \App\Model\Entity\QuotesStatus newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\QuotesStatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\QuotesStatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\QuotesStatus findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\QuotesStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\QuotesStatus[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\QuotesStatus|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QuotesStatus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QuotesStatus[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\QuotesStatus[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\QuotesStatus[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\QuotesStatus[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class QuotesStatusesTable extends Table
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

        $this->setTable('quotes_statuses');
        $this->setDisplayField('name');
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
            ->maxLength('name', 100)
            ->notEmptyString('name');

        return $validator;
    }
}
