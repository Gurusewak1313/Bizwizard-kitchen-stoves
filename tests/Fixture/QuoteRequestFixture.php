<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QuoteRequestFixture
 */
class QuoteRequestFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'quote_request';
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
                'quote_date' => '2022-04-07',
                'cust_name' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'cust_email' => 'Lorem ipsum dolor sit a',
                'cust_phone' => 1,
                'street_number' => 'Lorem ipsu',
                'street_name' => 'Lorem ipsum dolor sit a',
                'suburb' => 'Lorem ipsum dolor sit a',
                'postcode' => 1,
                'state' => 'Lor',
                'stone_type' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'length' => 1,
                'width' => 1,
                'thickness' => 1,
                'no_sink_cut' => 1,
                'status_id' => 1,
            ],
        ];
        parent::init();
    }
}
