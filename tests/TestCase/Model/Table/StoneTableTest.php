<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StoneTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StoneTable Test Case
 */
class StoneTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StoneTable
     */
    protected $Stone;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Stone',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Stone') ? [] : ['className' => StoneTable::class];
        $this->Stone = $this->getTableLocator()->get('Stone', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Stone);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\StoneTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
