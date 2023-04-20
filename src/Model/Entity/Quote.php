<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Quote Entity
 *
 * @property int $id
 * @property int|null $client_id
 * @property int|null $supplier_id
 * @property string|null $title
 * @property int|null $status_id
 * @property string|null $comment
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Supplier $supplier
 * @property \App\Model\Entity\QuotesStatus $quotes_status
 * @property \App\Model\Entity\Bill[] $bills
 * @property \App\Model\Entity\Document[] $documents
 * @property \App\Model\Entity\Note[] $notes
 * @property \App\Model\Entity\QuotesItem[] $quotes_items
 */
class Quote extends Entity
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
        'client_id' => true,
        'supplier_id' => true,
        'title' => true,
        'status_id' => true,
        'comment' => true,
        'created' => true,
        'client' => true,
        'supplier' => true,
        'quotes_status' => true,
        'bills' => true,
        'documents' => true,
        'notes' => true,
        'quotes_items' => true,
    ];
}
