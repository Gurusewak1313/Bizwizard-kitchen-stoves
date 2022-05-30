<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuoteRequestTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuoteRequestTable Test Case
 */
class QuoteRequestTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\QuoteRequestTable
     */
    protected $QuoteRequest;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.QuoteRequest',
        'app.Status',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('QuoteRequest') ? [] : ['className' => QuoteRequestTable::class];
        $this->QuoteRequest = $this->getTableLocator()->get('QuoteRequest', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->QuoteRequest);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\QuoteRequestTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\QuoteRequestTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
