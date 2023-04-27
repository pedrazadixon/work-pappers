<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Suppliers Model
 *
 * @property \App\Model\Table\IdentificationTypesTable&\Cake\ORM\Association\BelongsTo $IdentificationTypes
 * @property \App\Model\Table\BillsTable&\Cake\ORM\Association\HasMany $Bills
 * @property \App\Model\Table\QuotesTable&\Cake\ORM\Association\HasMany $Quotes
 *
 * @method \App\Model\Entity\Supplier newEmptyEntity()
 * @method \App\Model\Entity\Supplier newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Supplier[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Supplier get($primaryKey, $options = [])
 * @method \App\Model\Entity\Supplier findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Supplier patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Supplier[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Supplier|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Supplier saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Supplier[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Supplier[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Supplier[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Supplier[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SuppliersTable extends Table
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

        $this->setTable('suppliers');
        $this->setDisplayField('company_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('IdentificationTypes', [
            'foreignKey' => 'identification_type_id',
        ]);
        $this->hasMany('Bills', [
            'foreignKey' => 'supplier_id',
        ]);
        $this->hasMany('Quotes', [
            'foreignKey' => 'supplier_id',
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
            ->maxLength('first_name', 255)
            ->notEmptyString('first_name');

        $validator
            ->maxLength('last_name', 255)
            ->notEmptyString('last_name');

        $validator
            ->maxLength('company_name', 255)
            ->notEmptyString('company_name');

        $validator
            ->maxLength('title', 255)
            ->notEmptyString('title');

        $validator
            ->integer('identification_type_id')
            ->notEmptyString('identification_type_id');

        $validator
            ->maxLength('identification_number', 100)
            ->notEmptyString('identification_number');

        $validator
            ->maxLength('phone', 100)
            ->notEmptyString('phone');

        $validator
            ->email('email')
            ->notEmptyString('email');

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
        $rules->add($rules->existsIn('identification_type_id', 'IdentificationTypes'), ['errorField' => 'identification_type_id']);

        return $rules;
    }
}
