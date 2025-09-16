<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BemMoveisTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BemMoveisTable Test Case
 */
class BemMoveisTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BemMoveisTable
     */
    protected $BemMoveis;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.BemMoveis',
        'app.Responsavels',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('BemMoveis') ? [] : ['className' => BemMoveisTable::class];
        $this->BemMoveis = $this->getTableLocator()->get('BemMoveis', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->BemMoveis);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\BemMoveisTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\BemMoveisTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
