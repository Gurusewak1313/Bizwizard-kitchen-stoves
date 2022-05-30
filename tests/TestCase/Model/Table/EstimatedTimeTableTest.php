<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EstimatedTimeTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EstimatedTimeTable Test Case
 */
class EstimatedTimeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EstimatedTimeTable
     */
    protected $EstimatedTime;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.EstimatedTime',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('EstimatedTime') ? [] : ['className' => EstimatedTimeTable::class];
        $this->EstimatedTime = $this->getTableLocator()->get('EstimatedTime', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->EstimatedTime);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EstimatedTimeTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
