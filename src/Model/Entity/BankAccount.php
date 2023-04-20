<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BankAccount Entity
 *
 * @property int $id
 * @property string|null $bank_name
 * @property int|null $account_type_id
 * @property string|null $account_number
 * @property string|null $holder_name
 * @property int|null $holder_identification_type_id
 * @property string|null $holder_identication_number
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\BankAccountType $bank_account_type
 * @property \App\Model\Entity\IdentificationType $identification_type
 * @property \App\Model\Entity\Bill[] $bills
 */
class BankAccount extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'bank_name' => true,
        'account_type_id' => true,
        'account_number' => true,
        'holder_name' => true,
        'holder_identification_type_id' => true,
        'holder_identication_number' => true,
        'created' => true,
        'bank_account_type' => true,
        'identification_type' => true,
        'bills' => true,
    ];

    protected function _getFullName()
    {
        return $this->bank_name . ' ' . $this->account_number . ' (' . $this->holder_name . ')';
    }
}
