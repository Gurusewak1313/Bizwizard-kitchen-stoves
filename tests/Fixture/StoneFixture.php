<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StoneFixture
 */
class StoneFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'stone';
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
                'stone_name' => 'Lorem ipsum dolor sit amet',
                'stone_price_m2' => 1,
            ],
        ];
        parent::init();
    }
}
