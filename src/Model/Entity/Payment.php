<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity
 *
 * @property int $id
 * @property int|null $bill_id
 * @property int|null $status_id
 * @property string|null $comment
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Bill $bill
 * @property \App\Model\Entity\PaymentStatus $payment_status
 */
class Payment extends Entity
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
        'bill_id' => true,
        'status_id' => true,
        'comment' => true,
        'created' => true,
        'bill' => true,
        'payment_status' => true,
    ];
}
