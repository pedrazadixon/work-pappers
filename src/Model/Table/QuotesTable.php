<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Quotes Model
 *
 * @property \App\Model\Table\ClientsTable&\Cake\ORM\Association\BelongsTo $Clients
 * @property \App\Model\Table\SuppliersTable&\Cake\ORM\Association\BelongsTo $Suppliers
 * @property \App\Model\Table\QuotesStatusesTable&\Cake\ORM\Association\BelongsTo $QuotesStatuses
 * @property \App\Model\Table\BillsTable&\Cake\ORM\Association\HasMany $Bills
 * @property \App\Model\Table\DocumentsTable&\Cake\ORM\Association\HasMany $Documents
 * @property \App\Model\Table\NotesTable&\Cake\ORM\Association\HasMany $Notes
 * @property \App\Model\Table\QuotesItemsTable&\Cake\ORM\Association\HasMany $QuotesItems
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
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class QuotesTable extends Table
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

        $this->setTable('quotes');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
        ]);
        $this->belongsTo('Suppliers', [
            'foreignKey' => 'supplier_id',
        ]);
        $this->belongsTo('QuotesStatuses', [
            'foreignKey' => 'status_id',
        ]);
        $this->hasMany('Bills', [
            'foreignKey' => 'quote_id',
        ]);
        $this->hasMany('Documents', [
            'foreignKey' => 'quote_id',
        ]);
        $this->hasMany('Notes', [
            'foreignKey' => 'quote_id',
        ]);
        $this->hasMany('QuotesItems', [
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
            ->integer('client_id')
            ->allowEmptyString('client_id');

        $validator
            ->integer('supplier_id')
            ->allowEmptyString('supplier_id');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->allowEmptyString('title');

        $validator
            ->integer('status_id')
            ->allowEmptyString('status_id');

        $validator
            ->scalar('comment')
            ->maxLength('comment', 16777215)
            ->allowEmptyString('comment');

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
        $rules->add($rules->existsIn('client_id', 'Clients'), ['errorField' => 'client_id']);
        $rules->add($rules->existsIn('supplier_id', 'Suppliers'), ['errorField' => 'supplier_id']);
        $rules->add($rules->existsIn('status_id', 'QuotesStatuses'), ['errorField' => 'status_id']);

        return $rules;
    }
}
