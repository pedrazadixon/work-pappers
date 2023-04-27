<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BankAccountTypes Model
 *
 * @method \App\Model\Entity\BankAccountType newEmptyEntity()
 * @method \App\Model\Entity\BankAccountType newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\BankAccountType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BankAccountType get($primaryKey, $options = [])
 * @method \App\Model\Entity\BankAccountType findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\BankAccountType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BankAccountType[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BankAccountType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BankAccountType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BankAccountType[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BankAccountType[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\BankAccountType[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BankAccountType[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class BankAccountTypesTable extends Table
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

        $this->setTable('bank_account_types');
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
