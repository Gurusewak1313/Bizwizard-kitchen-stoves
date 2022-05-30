<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Quote Entity
 *
 * @property int $id
 * @property float $initial_price
 * @property float $final_price
 * @property string $est_time_id
 * @property string $comments
 * @property int $quote_request_id
 *
 * @property \App\Model\Entity\QuoteRequest $quote_request
 * @property \App\Model\Entity\EstimatedTime $estimated_time
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
     * @var array
     */
    protected $_accessible = [
        'initial_price' => true,
        'final_price' => true,
        'est_time_id' => true,
        'comments' => true,
        'quote_request_id' => true,
        'quote_request' => true,
    ];
}
