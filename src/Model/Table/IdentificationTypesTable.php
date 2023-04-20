<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * IdentificationTypes Model
 *
 * @property \App\Model\Table\ClientsTable&\Cake\ORM\Association\HasMany $Clients
 * @property \App\Model\Table\SuppliersTable&\Cake\ORM\Association\HasMany $Suppliers
 *
 * @method \App\Model\Entity\IdentificationType newEmptyEntity()
 * @method \App\Model\Entity\IdentificationType newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\IdentificationType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\IdentificationType get($primaryKey, $options = [])
 * @method \App\Model\Entity\IdentificationType findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\IdentificationType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\IdentificationType[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\IdentificationType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IdentificationType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IdentificationType[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\IdentificationType[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\IdentificationType[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\IdentificationType[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class IdentificationTypesTable extends Table
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

        $this->setTable('identification_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Clients', [
            'foreignKey' => 'identification_type_id',
        ]);
        $this->hasMany('Suppliers', [
            'foreignKey' => 'identification_type_id',
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
            ->scalar('name')
            ->maxLength('name', 100)
            ->allowEmptyString('name');

        $validator
            ->scalar('acronym')
            ->maxLength('acronym', 25)
            ->allowEmptyString('acronym');

        return $validator;
    }
}
