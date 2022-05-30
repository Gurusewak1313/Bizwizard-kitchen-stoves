<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QuoteRequest Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $quote_date
 * @property string $cust_name
 * @property string $cust_email
 * @property int $cust_phone
 * @property string $street_number
 * @property string $street_name
 * @property string $suburb
 * @property int $postcode
 * @property string $state
 * @property string $stone_type
 * @property int $length
 * @property int $width
 * @property int $thickness
 * @property int $no_sink_cut
 * @property int $status_id
 *
 * @property \App\Model\Entity\Status $status
 */
class QuoteRequest extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'quote_date' => true,
        'cust_name' => true,
        'cust_email' => true,
        'cust_phone' => true,
        'street_number'=> true,
        'street_name'=> true,
        'suburb'=> true,
        'postcode'=> true,
        'state'=> true,
        'stone_type' => true,
        'length' => true,
        'width' => true,
        'thickness' => true,
        'no_sink_cut' => true,
        'status_id' => true,
        'status' => true,
    ];
}
