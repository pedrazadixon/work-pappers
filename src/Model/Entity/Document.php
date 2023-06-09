<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Document Entity
 *
 * @property int $id
 * @property int|null $quote_id
 * @property string|null $name
 * @property string|null $path
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Quote $quote
 */
class Document extends Entity
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
        'name' => true,
        'path' => true,
        'created' => true,
        'quote' => true,
    ];
}
