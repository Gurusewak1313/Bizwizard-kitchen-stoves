<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EstimatedTimeFixture
 */
class EstimatedTimeFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'estimated_time';
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
                'est_time' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
