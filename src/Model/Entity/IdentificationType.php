<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * IdentificationType Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $acronym
 *
 * @property \App\Model\Entity\Client[] $clients
 * @property \App\Model\Entity\Supplier[] $suppliers
 */
class IdentificationType extends Entity
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
        'name' => true,
        'acronym' => true,
        'clients' => true,
        'suppliers' => true,
    ];
}
