<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QuoteFixture
 */
class QuoteFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'quote';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'inital_price' => 1,
                'final_price' => 1,
                'est_time' => 'Lorem ipsum dolor sit amet',
                'comments' => 'Lorem ipsum dolor sit amet',
                'quote_request_id' => 1,
            ],
        ];
        parent::init();
    }
}
