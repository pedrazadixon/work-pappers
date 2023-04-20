<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QuotesItem Entity
 *
 * @property int $id
 * @property int|null $quote_id
 * @property string|null $description
 * @property int|null $hours
 * @property string|null $hour_price
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Quote $quote
 */
class QuotesItem extends Entity
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
        'description' => true,
        'hours' => true,
        'hour_price' => true,
        'created' => true,
        'quote' => true,
    ];
}
