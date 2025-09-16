<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BemImoveisTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BemImoveisTable Test Case
 */
class BemImoveisTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BemImoveisTable
     */
    protected $BemImoveis;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.BemImoveis',
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
        $config = $this->getTableLocator()->exists('BemImoveis') ? [] : ['className' => BemImoveisTable::class];
        $this->BemImoveis = $this->getTableLocator()->get('BemImoveis', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->BemImoveis);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\BemImoveisTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\BemImoveisTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
