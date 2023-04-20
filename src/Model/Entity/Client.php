<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $company_name
 * @property int|null $identification_type_id
 * @property string|null $identification_number
 * @property string|null $phone
 * @property string|null $email
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\IdentificationType $identification_type
 * @property \App\Model\Entity\Quote[] $quotes
 */
class Client extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'company_name' => true,
        'identification_type_id' => true,
        'identification_number' => true,
        'phone' => true,
        'email' => true,
        'created' => true,
        'identification_type' => true,
        'quotes' => true,
    ];
}
