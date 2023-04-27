<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BankAccounts Model
 *
 * @property \App\Model\Table\BankAccountTypesTable&\Cake\ORM\Association\BelongsTo $BankAccountTypes
 * @property \App\Model\Table\IdentificationTypesTable&\Cake\ORM\Association\BelongsTo $IdentificationTypes
 * @property \App\Model\Table\BillsTable&\Cake\ORM\Association\HasMany $Bills
 *
 * @method \App\Model\Entity\BankAccount newEmptyEntity()
 * @method \App\Model\Entity\BankAccount newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\BankAccount[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BankAccount get($primaryKey, $options = [])
 * @method \App\Model\Entity\BankAccount findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\BankAccount patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BankAccount[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BankAccount|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BankAccount saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BankAccount[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BankAccount[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\BankAccount[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BankAccount[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BankAccountsTable extends Table
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

        $this->setTable('bank_accounts');
        $this->setDisplayField('full_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('BankAccountTypes', [
            'foreignKey' => 'account_type_id',
        ]);
        $this->belongsTo('IdentificationTypes', [
            'foreignKey' => 'holder_identification_type_id',
        ]);
        $this->hasMany('Bills', [
            'foreignKey' => 'bank_account_id',
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
            ->maxLength('bank_name', 255)
            ->notEmptyString('bank_name');

        $validator
            ->integer('account_type_id')
            ->notEmptyString('account_type_id');

        $validator
            ->maxLength('account_number', 100)
            ->notEmptyString('account_number');

        $validator
            ->maxLength('holder_name', 255)
            ->notEmptyString('holder_name');

        $validator
            ->integer('holder_identification_type_id')
            ->notEmptyString('holder_identification_type_id');

        $validator
            ->maxLength('holder_identication_number', 100)
            ->notEmptyString('holder_identication_number');

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
        $rules->add($rules->existsIn('account_type_id', 'BankAccountTypes'), ['errorField' => 'account_type_id']);
        $rules->add($rules->existsIn('holder_identification_type_id', 'IdentificationTypes'), ['errorField' => 'holder_identification_type_id']);

        return $rules;
    }
}
