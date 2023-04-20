<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bills Model
 *
 * @property \App\Model\Table\QuotesTable&\Cake\ORM\Association\BelongsTo $Quotes
 * @property \App\Model\Table\SuppliersTable&\Cake\ORM\Association\BelongsTo $Suppliers
 * @property \App\Model\Table\BankAccountsTable&\Cake\ORM\Association\BelongsTo $BankAccounts
 * @property \App\Model\Table\BillsStatusesTable&\Cake\ORM\Association\BelongsTo $BillsStatuses
 * @property \App\Model\Table\PaymentsTable&\Cake\ORM\Association\HasMany $Payments
 *
 * @method \App\Model\Entity\Bill newEmptyEntity()
 * @method \App\Model\Entity\Bill newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Bill[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bill get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bill findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Bill patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bill[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bill|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bill saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bill[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Bill[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Bill[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Bill[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BillsTable extends Table
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

        $this->setTable('bills');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Quotes', [
            'foreignKey' => 'quote_id',
        ]);
        $this->belongsTo('Suppliers', [
            'foreignKey' => 'supplier_id',
        ]);
        $this->belongsTo('BankAccounts', [
            'foreignKey' => 'bank_account_id',
        ]);
        $this->belongsTo('BillsStatuses', [
            'foreignKey' => 'status_id',
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'bill_id',
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
            ->integer('supplier_id')
            ->allowEmptyString('supplier_id');

        $validator
            ->integer('bank_account_id')
            ->allowEmptyString('bank_account_id');

        $validator
            ->integer('status_id')
            ->allowEmptyString('status_id');

        $validator
            ->date('date')
            ->allowEmptyDate('date');

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
        $rules->add($rules->existsIn('supplier_id', 'Suppliers'), ['errorField' => 'supplier_id']);
        $rules->add($rules->existsIn('bank_account_id', 'BankAccounts'), ['errorField' => 'bank_account_id']);
        $rules->add($rules->existsIn('status_id', 'BillsStatuses'), ['errorField' => 'status_id']);

        return $rules;
    }
}
