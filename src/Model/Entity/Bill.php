<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bill Entity
 *
 * @property int $id
 * @property int|null $quote_id
 * @property int|null $supplier_id
 * @property int|null $bank_account_id
 * @property int|null $status_id
 * @property \Cake\I18n\FrozenDate|null $date
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Quote $quote
 * @property \App\Model\Entity\Supplier $supplier
 * @property \App\Model\Entity\BankAccount $bank_account
 * @property \App\Model\Entity\BillsStatus $bills_status
 * @property \App\Model\Entity\Payment[] $payments
 */
class Bill extends Entity
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
        'quote_id' => true,
        'supplier_id' => true,
        'bank_account_id' => true,
        'status_id' => true,
        'date' => true,
        'created' => true,
        'quote' => true,
        'supplier' => true,
        'bank_account' => true,
        'bills_status' => true,
        'payments' => true,
    ];
}
